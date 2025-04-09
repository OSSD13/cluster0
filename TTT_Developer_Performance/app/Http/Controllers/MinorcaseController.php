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
            WHERE m.mnc_is_use = 1
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
        $members = DB::select('
            SELECT u.usr_id, u.usr_username
            FROM user_team_history uth
            JOIN users u ON uth.uth_usr_id = u.usr_id
            WHERE uth.uth_tm_id = ?
        ', [$teamId]);
    
        return response()->json($members);
    }

    public function insert(Request $request)
    {
        $uth = DB::table('user_team_history')
            ->where('uth_usr_id', $request->uth_usr_id)
            ->where('uth_tm_id', $request->uth_tm_id)
            ->where('uth_is_current', 1)
            ->first();

        if (!$uth) {
            return redirect()->back()->withErrors('ไม่พบประวัติทีมของสมาชิกนี้');
        }

        $sprint = DB::table('sprints')
            ->where('spr_year', $request->spr_year)
            ->where('spr_number', $request->spr_number)
            ->first();

        if (!$sprint) {
            return redirect()->back()->withErrors('ไม่พบข้อมูล Sprint');
        }

        DB::table('minor_cases')->insert([
            'mnc_point'         => $request->mnc_point,
            'mnc_card_detail'   => $request->mnc_card_detail,
            'mnc_defect_detail' => $request->mnc_defect_detail,
            'mnc_uth_id'        => $uth->uth_id,
            'mnc_spr_id'        => $sprint->spr_id,
            'mnc_is_use'        => 1,
        ]);

        return redirect()->route('minorcase')->with('success', 'เพิ่ม Minor Case สำเร็จ');
    }
    

    public function store(Request $request)
    {
        $user = Users::find($request->uth_usr_id);
        $team = Team::find($request->uth_tm_id);
        $sprint = Sprint::find($request->spr_number);

        $uth = UserTeamHistory::where('uth_usr_id', $user->usr_id)
            ->where('uth_tm_id', $team->tm_id)
            // ->where('uth_is_use', 1)
            ->first();

        $point = PointCurrentSprint::where('pcs_spr_id', $sprint->sprint_id)
            ->where('pcs_uth_id', $uth->uth_id)
            ->where('pcs_is_use', 1)
            ->first();

        if ($point) {
            // เพิ่ม Minor Case ใหม่และดึง ID ที่เพิ่ม
            $minorCaseId = DB::table('minor_cases')->insertGetId([
                'mnc_card_detail'   => $request->mnc_card_detail ?? null,
                'mnc_defect_detail' => $request->mnc_defect_detail ?? null,
                'mnc_point'         => $request->mnc_point,
                'mnc_is_use'        => 1,
            ]);

            // อัปเดต ID ของ minor case ไปยังตาราง pcs
            $point->pcs_mnc_id = $minorCaseId;
            $point->save();
        }
        return redirect()->route('minorcase')->with('success', 'Minorcase added successfully.');
    }
    
    public function edit()
    {

        return view('pages.minorCase.editminorcase');
    }
public function update(Request $request, $id)
{
    // Validate
    $request->validate([
        'uth_usr_id' => 'required',
        'uth_tm_id' => 'required',
        'spr_year' => 'required',
        'spr_number' => 'required',
        'mnc_point' => 'required|numeric',
    ]);

    // หา uth_id
    $uth = DB::table('user_team_history')
        ->where('uth_usr_id', $request->uth_usr_id)
        ->where('uth_tm_id', $request->uth_tm_id)
        ->where('uth_is_current', 1)
        ->first();

    if (!$uth) {
        return back()->withErrors('ไม่พบประวัติทีมของสมาชิกนี้');
    }

    $sprint = DB::table('sprints')
        ->where('spr_year', $request->spr_year)
        ->where('spr_number', $request->spr_number)
        ->first();

    if (!$sprint) {
        return back()->withErrors('ไม่พบข้อมูล Sprint');
    }

    DB::table('minor_cases')
        ->where('mnc_id', $id)
        ->update([
            'mnc_point'         => $request->mnc_point,
            'mnc_card_detail'   => $request->mnc_card_detail ?? null,
            'mnc_defect_detail' => $request->mnc_defect_detail ?? null,
            'mnc_uth_id'        => $uth->uth_id,
            'mnc_spr_id'        => $sprint->spr_id,
        ]);

    return redirect()->route('minorcase')->with('success', 'Minor Case updated successfully.');
}



  
    public function delete($id)
    {
        $point = PointCurrentSprint::find($id);

        if (!$point) {
            return redirect()->route('minorcase')->with('error', 'Minorcase not found.');
        }

        if ($point->pcs_is_use == 0) {
            return redirect()->route('minorcase')->with('error', 'Minorcase already deleted.');
        }

        $point->pcs_is_use = 0;
        $point->save();

        return redirect()->route('minorcase')->with('success', 'Minorcase deleted successfully.');
    }
}