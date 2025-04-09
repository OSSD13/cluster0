<?php

namespace App\Http\Controllers;


use App\Models\Backlog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('backlogs as b')
            ->join('user_team_history as uth', 'b.blg_uth_id', '=', 'uth.uth_id')
            ->join('users as u', 'uth.uth_usr_id', '=', 'u.usr_id')
            ->join('teams as t', 'uth.uth_tm_id', '=', 't.tm_id')
            ->join('sprints as s', 'b.blg_spr_id', '=', 's.spr_id')
            ->select(
                'b.blg_id',
                's.spr_year',
                's.spr_number',
                'u.usr_username',
                't.tm_name',
                'b.blg_pass_point as blg_pass',
                'b.blg_bug',
                'b.blg_cancel',
                DB::raw('(b.blg_pass_point + b.blg_bug + b.blg_cancel) as blg_point_all')
            )
            ->where('b.blg_is_use', 1);

        if ($request->has('years') && !empty($request->years)) {
            $years = explode(',', $request->years);
            $query->whereIn('s.spr_year', $years);
        }

        if ($request->has('sprints') && !empty($request->sprints)) {
            $sprints = explode(',', $request->sprints);
            $query->whereIn('s.spr_number', $sprints);
        }

        if ($request->has('teams') && !empty($request->teams)) {
            $teams = explode(',', $request->teams);
            $query->whereIn('t.tm_name', $teams);
        }

        if ($request->has('members') && !empty($request->members)) {
            $members = explode(',', $request->members);
            $query->whereIn('u.usr_username', $members);
        }

        $backlogs = $query->get();

        $members = DB::table('users')->pluck('usr_username');
        $years = $backlogs->pluck('spr_year')->unique()->sortDesc();
        $sprints = $backlogs->pluck('spr_number')->unique()->sort();
        $teams = $backlogs->pluck('tm_name')->filter()->unique()->values();

        return view('pages.backlog.backlog', compact('backlogs', 'years', 'sprints', 'teams', 'members'));
    }

    public function destroy($id)
    {
        $backlog = Backlog::find($id);
        if ($backlog) {
            $backlog->blg_is_use = 0;
            $backlog->save();
            return redirect()->route('backlog')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
        }
        return redirect()->route('backlog')->with('error', 'ไม่พบข้อมูลที่ต้องการลบ');
    }
    public function edit($id)
    {
        // ค้นหา Backlog ตาม ID
        $backlog = Backlog::findOrFail($id);

        // ดึงข้อมูลทีม, ผู้ใช้, สปรินท์ และปีที่ไม่ซ้ำจากสปรินท์
        $teams = DB::table('teams')->get();
        $users = DB::table('users')->get();
        $sprints = DB::table('sprints')->get();
        $years = DB::table('sprints')->select('spr_year')->distinct()->get();

        // คิวรีข้อมูลตามการเชื่อมโยง
        $backlogDetails = DB::table('backlogs as b')
            ->join('user_team_history as uth', 'b.blg_uth_id', '=', 'uth.uth_id')
            ->join('users as u', 'uth.uth_usr_id', '=', 'u.usr_id')
            ->join('teams as t', 'uth.uth_tm_id', '=', 't.tm_id')
            ->join('sprints as s', 'b.blg_spr_id', '=', 's.spr_id')
            ->select(
                'b.blg_id',
                's.spr_year',
                's.spr_number',
                'u.usr_username',
                't.tm_name',
                'b.blg_pass_point as blg_pass',
                'b.blg_bug',
                'b.blg_cancel',
                DB::raw('(b.blg_pass_point + b.blg_bug + b.blg_cancel) as blg_point_all')
            )
            ->where('b.blg_is_use', 1)
            ->where('b.blg_id', $id)  // กรองตาม ID ของ backlog ที่ต้องการแก้ไข
            ->first();  // ดึงข้อมูล 1 แถวเนื่องจากเรากำหนด ID ที่เฉพาะเจาะจง

        return view('pages.backlog.editBacklog', compact('backlog', 'teams', 'users', 'sprints', 'years', 'backlogDetails'));
    }



    public function update(Request $request, $id)
    {
        // ค้นหา Backlog ตาม ID
        $backlog = Backlog::findOrFail($id);

        // ตรวจสอบและยืนยันข้อมูลที่ส่งมา
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,tm_id',
            'member_id' => 'required|exists:users,usr_id',
            'year' => 'required|exists:sprints,spr_id',
            'sprint_id' => 'required|exists:sprints,spr_id',
            'test_pass' => 'required|numeric',
            'bug' => 'required|numeric',
            'cancel' => 'required|numeric',
        ]);

        // อัปเดตข้อมูลของ Backlog
        $backlog->blg_tm_id = $request->team_id;        // อัปเดตทีม
        $backlog->blg_usr_id = $request->member_id;     // อัปเดตสมาชิก
        $backlog->blg_spr_id = $request->sprint_id;     // อัปเดต Sprint
        $backlog->blg_pass_point = $request->test_pass; // อัปเดต Test Pass
        $backlog->blg_bug = $request->bug;              // อัปเดต Bug
        $backlog->blg_cancel = $request->cancel;        // อัปเดต Cancel

        // บันทึกข้อมูลในฐานข้อมูล
        $backlog->save();

        // ส่งกลับไปยังหน้ารายการ backlog พร้อมข้อความสำเร็จ
        return redirect()->route('backlog')->with('success', 'Backlog updated successfully');
    }

    public function add()
    {
        $teams = DB::table('teams')->get();
        $sprints = DB::table('sprints')->get();

        return view('pages.backlog.addBacklog', compact('teams', 'sprints'));
    }


    public function store(Request $request)
    {
        // ตรวจสอบและยืนยันข้อมูลที่ส่งมา
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,tm_id',
            'member_id' => 'required|exists:users,usr_id',
            'year' => 'required|exists:sprints,spr_year',
            'sprint_id' => 'required|exists:sprints,spr_id',
            'test_pass' => 'required|numeric',
            'bug' => 'required|numeric',
            'cancel' => 'required|numeric',
        ]);

        // สร้าง Backlog ใหม่
        $backlog = new Backlog();
        $backlog->blg_pass_point = $request->test_pass;
        $backlog->blg_personal_point = 220; // กำหนดค่าเริ่มต้น
        $backlog->blg_bug = $request->bug;
        $backlog->blg_cancel = $request->cancel;
        $backlog->blg_is_use = 1; // ค่าเริ่มต้น
        $backlog->blg_uth_id = 56; // ค่าเริ่มต้น
        $backlog->blg_spr_id = $request->sprint_id;

        // บันทึกข้อมูลลงในฐานข้อมูล
        $backlog->save();

        return redirect()->route('backlog')->with('success', 'Backlog added successfully');
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
}
