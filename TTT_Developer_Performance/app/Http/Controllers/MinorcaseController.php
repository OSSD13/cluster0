<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\PointCurrentSprint;
use App\Models\MinorCase;
use App\Models\Sprint;
use App\Models\Users;
use App\Models\Team;
use App\Models\UserTeamHistory;
use Illuminate\Support\Facades\DB;


class MinorcaseController extends Controller
{
    public function index()
{
    $points = DB::select('
        SELECT
            m.mnc_id,
            s.spr_year,
            s.spr_number,
            u.usr_username,
            t.tm_name,
            m.mnc_point,
            m.mnc_card_detail,
            m.mnc_defect_detail
        FROM minor_cases m
        JOIN user_team_history uth ON m.mnc_uth_id = uth.uth_id
        JOIN users u ON uth.uth_usr_id = u.usr_id
        JOIN teams t ON uth.uth_tm_id = t.tm_id
        JOIN sprints s ON m.mnc_spr_id = s.spr_id
        WHERE m.mnc_is_use = 1  -- เฉพาะที่ยังไม่ถูกลบ
    ');

    return view('pages.minorCase.minorcase', compact('points'));
}


    // ฟอร์มเพิ่มข้อมูล
    public function add()
    {
        $teams = DB::table('teams')->get();
        $sprints = DB::table('sprints')->get();

        return view('pages.minorCase.addminorcase', compact('teams', 'sprints'));
    }

    public function getMembersByTeam($teamId)
{
    // ค้นหาสมาชิกทีมล่าสุดที่มีสถานะเป็นปัจจุบัน (uth_is_current = 1)
    $members = DB::select('
        SELECT u.usr_id, u.usr_username
        FROM user_team_history uth
        JOIN users u ON uth.uth_usr_id = u.usr_id
        WHERE uth.uth_tm_id = ? AND uth.uth_is_current = 1
    ', [$teamId]);

    return response()->json($members);
}


    public function insert(Request $request)
    {
        // Validate ข้อมูลเบื้องต้น
        $validated = $request->validate([
            'uth_usr_id'         => 'required|exists:users,usr_id',
            'uth_tm_id'          => 'required|exists:teams,tm_id',
            'spr_year'           => 'required|exists:sprints,spr_year',
            'spr_number'         => 'required|exists:sprints,spr_number',
            'mnc_point'          => 'required|numeric',
        ]);

        // ค้นหา user_team_history
        $uth = DB::table('user_team_history')
            ->where('uth_usr_id', $request->uth_usr_id)
            ->where('uth_tm_id', $request->uth_tm_id)
            ->where('uth_is_current', 1)
            ->first();

        if (!$uth) {
            return redirect()->back()->withErrors('ไม่พบประวัติทีมของสมาชิกนี้');
        }

        // ค้นหา Sprint
        $sprint = DB::table('sprints')
            ->where('spr_year', $request->spr_year)
            ->where('spr_number', $request->spr_number)
            ->first();

        if (!$sprint) {
            return redirect()->back()->withErrors('ไม่พบข้อมูล Sprint');
        }

        // Insert ข้อมูล minor_case
        $minorCaseId = DB::table('minor_cases')->insertGetId([
            'mnc_card_detail'      => $request->mnc_card_detail ?? null,
            'mnc_defect_detail'    => $request->mnc_defect_detail ?? null,
            'mnc_point'            => $request->mnc_point,
            'mnc_personal_point'   => $request->mnc_point, // ✅ สำคัญ
            'mnc_uth_id'           => $uth->uth_id,
            'mnc_spr_id'           => $sprint->spr_id,
            'mnc_is_use'           => 1,
        ]);

        // อัปเดต point ในตาราง points_current_sprint (ถ้ามี)
        $point = DB::table('points_current_sprint')
            ->where('pcs_spr_id', $sprint->spr_id)
            ->where('pcs_uth_id', $uth->uth_id)
            ->first();

        if ($point) {
            DB::table('points_current_sprint')
                ->where('pcs_id', $point->pcs_id)
                ->update(['pcs_mnc_id' => $minorCaseId]);
        }

        return redirect()->route('minorcase')->with('success', 'เพิ่ม Minor Case สำเร็จ');
    }



    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลจากฟอร์ม
        // dd($request->all()); // ยืนยันว่าได้ข้อมูลมาครบ

        $validated = $request->validate([
            'uth_usr_id' => 'required|exists:users,usr_id',
            'uth_tm_id'  => 'required|exists:teams,tm_id',
            'spr_year'   => 'required|exists:sprints,spr_year',
            'spr_number' => 'required|exists:sprints,spr_number',
            'mnc_point'  => 'required|numeric',
        ]);

        try {
            $user = Users::find($request->uth_usr_id);
            $team = Team::find($request->uth_tm_id);

            // หา Sprint จาก year + number
            $sprint = Sprint::where('spr_year', $request->spr_year)
                ->where('spr_number', $request->spr_number)
                ->first();

            if (!$sprint) {
                return redirect()->back()->withErrors('ไม่พบข้อมูล Sprint');
            }

            // หา UserTeamHistory
            $uth = UserTeamHistory::where('uth_usr_id', $user->usr_id)
                ->where('uth_tm_id', $team->tm_id)
                ->where('uth_is_current', 1)
                ->first();

            if (!$uth) {
                return redirect()->back()->withErrors('ไม่พบประวัติทีมของสมาชิกนี้');
            }

            // หา point sprint
            $point = PointCurrentSprint::where('pcs_spr_id', $sprint->spr_id)
                ->where('pcs_uth_id', $uth->uth_id)
                ->first();

            // สร้าง Minor Case
            $minorCaseId = DB::table('minor_cases')->insertGetId([
                'mnc_card_detail'   => $request->mnc_card_detail,
                'mnc_defect_detail' => $request->mnc_defect_detail,
                'mnc_point'         => $request->mnc_point,
                'mnc_uth_id'        => $uth->uth_id,
                'mnc_spr_id'        => $sprint->spr_id,
                'mnc_is_use'        => 1,
            ]);

            // ถ้ามี point ให้อัพเดต
            if ($point) {
                $point->pcs_mnc_id = $minorCaseId;
                $point->save();
            }

            return redirect()->route('minorcase')->with('success', 'Minorcase added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
    }



    public function edit($id){
    // ดึงข้อมูล Minor Case จาก DB ด้วย ID
    $minorCase = DB::table('minor_cases')->where('mnc_id', $id)->first();

    // ดึง team และ sprint จาก DB
    $teams = DB::table('teams')->get();
    $sprints = DB::table('sprints')->get();

    $minorCase = DB::table('minor_cases')->where('mnc_id', $id)->first();

    $teamName = DB::table('teams')
    ->join('user_team_history', 'teams.tm_id', '=', 'user_team_history.uth_tm_id')
    ->where('user_team_history.uth_id', $minorCase->mnc_uth_id)
    ->value('tm_name');  // คืนค่าชื่อทีม

    $userName = DB::table('users')
    ->join('user_team_history', 'users.usr_id', '=', 'user_team_history.uth_usr_id')
    ->where('user_team_history.uth_id', $minorCase->mnc_uth_id)
    ->value('usr_username');  // คืนค่าชื่อผู้ใช้


    // ส่งข้อมูลไปยัง view
    return view('pages.minorCase.editMinorcase', compact('minorCase', 'teams', 'sprints', 'teamName', 'userName'));
}


    public function update(Request $req, $id)
{
    $req->validate([
        'mnc_card_detail'   => 'nullable|string',
        'mnc_defect_detail' => 'nullable|string',
        'mnc_point'         => 'required|numeric'
    ]);

    $affected = DB::table('minor_cases')
        ->where('mnc_id', $id)
        ->update([
            'mnc_card_detail'   => $req->mnc_card_detail,
            'mnc_defect_detail' => $req->mnc_defect_detail,
            'mnc_point'         => $req->mnc_point,
        ]);

    if ($affected) {
        return redirect()->route('minorcase')->with('success', 'อัปเดต Minor Case สำเร็จ');
    } else {
        return redirect()->back()->withErrors('ไม่สามารถอัปเดต Minor Case ได้');
    }
}


    public function delete($id)
{
    // ค้นหาข้อมูล MinorCase ตาม ID (ใช้ mnc_id)
    $minorCase = MinorCase::find($id);

    if (!$minorCase) {
        return redirect()->route('minorcase')->with('error', 'Minorcase not found.');
    }

    // ตรวจสอบว่า Minorcase นี้ถูกลบไปแล้วหรือไม่
    if ($minorCase->mnc_is_use == 0) {
        return redirect()->route('minorcase')->with('error', 'Minorcase already deleted.');
    }

    // ทำการ Soft Delete โดยการอัปเดตค่า mnc_is_use เป็น 0
    $minorCase->mnc_is_use = 0;
    $minorCase->save();

    // ลบการเชื่อมโยง MinorCase ออกจาก point ในตาราง points_current_sprint
    //$point = PointCurrentSprint::where('pcs_mnc_id', $minorCase->mnc_id)->first();

    // if ($point) {
    //     // ลบการเชื่อมโยง MinorCase ออกจาก point ในตาราง points_current_sprint
    //     $point->pcs_mnc_id = null;
    //     $point->save();
    // }

    return redirect()->route('minorcase')->with('success', 'Minorcase soft deleted successfully.');
}


}