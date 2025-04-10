<?php
namespace App\Http\Controllers;

use App\Models\Backlog;
use App\Models\UserTeamHistory;
use App\Models\Sprint;
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

        // Filter based on query parameters
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

        // Get filterable data
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

    public function add()
    {
        $teams = DB::table('teams')->get();
        $sprints = DB::table('sprints')->get();

        return view('pages.backlog.addBacklog', compact('teams', 'sprints'));
    }

    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลจากฟอร์ม
        $validated = $request->validate([
            'blg_tm_id' => 'required|exists:teams,tm_id',
            'blg_usr_id' => 'required|exists:user_team_history,uth_usr_id',
            'blg_spr_id' => 'required|exists:sprints,spr_id',
            'blg_pass_point' => 'required|numeric',
            'blg_bug' => 'required|numeric',
            'blg_cancel' => 'required|numeric',
        ]);

        $team = DB::table('teams')->where('tm_id', $request->blg_tm_id)->first();
        if (!$team || $team->tm_is_use != 1) {
            return redirect()->back()->withErrors('ทีมที่เลือกไม่สามารถใช้งานได้');
        }

        try {
            // ค้นหา UserTeamHistory โดยใช้ uth_usr_id ที่ส่งมาจากฟอร์ม
            $uth = DB::table('user_team_history')
                ->where('uth_usr_id', $request->blg_usr_id) // ใช้ blg_usr_id แทน blg_uth_id
                ->where('uth_tm_id', $request->blg_tm_id) // ตรวจสอบทีมที่เลือกด้วย
                ->where('uth_is_current', 1)
                ->first();

            if (!$uth) {
                return redirect()->back()->withErrors('ไม่พบประวัติทีมของสมาชิกนี้');
            }

            // ค้นหา Sprint
            $sprint = DB::table('sprints')
                ->where('spr_id', $request->blg_spr_id)
                ->first();

            if (!$sprint) {
                return redirect()->back()->withErrors('ไม่พบข้อมูล Sprint');
            }

            // Insert ข้อมูล backlog
            $backlogId = DB::table('backlogs')->insertGetId([
                'blg_pass_point' => $request->blg_pass_point,
                'blg_bug' => $request->blg_bug,
                'blg_cancel' => $request->blg_cancel,
                'blg_is_use' => 1,
                'blg_uth_id' => $uth->uth_id,
                'blg_spr_id' => $sprint->spr_id,
                'blg_personal_point' => 0,
            ]);

            // ถ้ามี point อัพเดตข้อมูลใน points_current_sprint
            $point = DB::table('points_current_sprint')
                ->where('pcs_spr_id', $sprint->spr_id)
                ->where('pcs_uth_id', $uth->uth_id)
                ->first();

            if ($point) {
                DB::table('points_current_sprint')
                    ->where('pcs_id', $point->pcs_id)
                    ->update(['pcs_blg_id' => $backlogId]);
            }

            return redirect()->route('backlog')->with('success', 'เพิ่ม Backlog สำเร็จ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
    }
    function findUTHID($memberID, $teamID)
    {
        $userTeamHistory1 = DB::table('user_team_history')
            ->select('uth_id', 'uth_usr_id')
            ->where([
                ['uth_usr_id', '=', $memberID],
                ['uth_tm_id', '=', $teamID]
            ])
            ->first();
        if ($userTeamHistory1 != null) {
            return $userTeamHistory1->uth_id;
        } else {
            $userTeamHistory2 = UserTeamHistory::where([
                ['uth_usr_id', '=', $memberID],
                ['uth_is_use', 1]
            ])
                ->first();
            $userTeamHistory2->uth_tm_id = $teamID;
            $userTeamHistory2->save();
            return $userTeamHistory2->uth_id;
        }
    }

    public function edit(Request $request)
    {

        $editID = $request->editID;

        // ดึงข้อมูลเดิมของ backlog
        $backlog = DB::table('backlogs')->where('blg_id', $editID)->first();

        // ดึงข้อมูลอื่นๆ เหมือนเดิม
        $users = DB::table('users')
            ->where('usr_is_use', '=', 1)
            ->where('usr_role', '=', 'Developer')
            ->select('usr_id as id', 'usr_username as name')
            ->get();

        $teams = DB::table('teams')
            ->where('tm_is_use', '=', 1)
            ->select('tm_id', 'tm_name', 'tm_is_use') // <-- ไม่มี alias
            ->get();



        $years = DB::table('sprints')
            ->select('spr_year as year')
            ->distinct()
            ->get();

        $sprints = DB::table('sprints')
            ->select('spr_number as number')
            ->distinct()
            ->get();

        return view('pages.backlog.editBacklog', compact('users', 'teams', 'sprints', 'years', 'editID', 'backlog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'team_id' => 'required',
            'member_id' => 'required',
            'year' => 'required',
            'sprint_id' => 'required',
            'test_pass' => 'required|numeric',
            'bug' => 'required|numeric',
            'cancel' => 'required|numeric',
        ]);

        $team = DB::table('teams')->where('tm_id', $request->team_id)->first();
        if (!$team || $team->tm_is_use != 1) {
            return redirect()->back()->withErrors('ทีมที่เลือกไม่สามารถใช้งานได้');
        }

        DB::table('backlogs')->where('blg_id', $id)->update([
            'blg_tm_id' => $request->team_id,
            'blg_usr_id' => $request->member_id,
            'blg_year' => $request->year,
            'blg_spr_id' => $request->sprint_id,
            'blg_test_pass' => $request->test_pass,
            'blg_bug' => $request->bug,
            'blg_cancel' => $request->cancel,
            'updated_at' => now(),
        ]);

        return redirect()->route('backlog')->with('success', 'Backlog updated successfully');
    }


}
