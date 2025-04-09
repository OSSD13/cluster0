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
            ->join('backlogs as b2', 'b.blg_id', '=', 'b2.blg_id')
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
        // ทำ soft delete โดยไม่ลบข้อมูลจริง
        $backlog = Backlog::find($id);
        if ($backlog) {
            $backlog->delete();
            return redirect()->route('backlog')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
        }

        return redirect()->route('backlog')->with('error', 'ไม่พบข้อมูลที่ต้องการลบ');
    }


    public function edit($id)
    {
        // ดึงข้อมูล backlog
        $backlog = DB::table('backlogs')
            ->leftJoin('points_current_sprint', 'backlogs.blg_id', '=', 'points_current_sprint.pcs_id')
            ->leftJoin('sprints', 'points_current_sprint.pcs_spr_id', '=', 'sprints.spr_id')
            ->leftJoin('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
            ->leftJoin('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->leftJoin('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->select(
                'backlogs.blg_id',
                'teams.tm_id',
                'teams.tm_name',  // ดึงข้อมูลชื่อทีม
                'users.usr_id',
                'users.usr_username',
                'sprints.spr_id',
                'sprints.spr_year',
                'sprints.spr_number',
                DB::raw('backlogs.blg_pass_point as blg_pass'),
                'backlogs.blg_bug',
                'backlogs.blg_cancel',
                DB::raw('(backlogs.blg_pass_point + backlogs.blg_bug + backlogs.blg_cancel) as blg_point_all')
            )
            ->where('backlogs.blg_id', $id)
            ->first();

        // ดึงข้อมูลอื่นๆ ที่จำเป็น
        $users = DB::table('users')->get();
        $teams = DB::table('teams')->get();
        $sprints = DB::table('sprints')->get();

        // ส่งข้อมูลไปยัง View
        return view('pages.backlog.editBacklog', compact('backlog', 'users', 'teams', 'sprints'));
    }


    public function update(Request $request, $id)
    {
        DB::table('backlogs')->where('blg_id', $id)->update([
            'blg_pass_point' => $request->input('test_pass'),
            'blg_bug' => $request->input('bug'),
            'blg_cancel' => $request->input('cancel'),
        ]);

        $pcs = DB::table('points_current_sprint')->where('pcs_id', $id)->first();

        if ($pcs) {
            DB::table('sprints')->where('spr_id', $pcs->pcs_spr_id)->update([
                'spr_year' => $request->input('year'),
                'spr_number' => $request->input('sprint')
            ]);

            DB::table('user_team_history')->where('uth_id', $pcs->pcs_uth_id)->update([
                'uth_usr_id' => $request->input('member'),
                'uth_tm_id' => $request->input('current_team')
            ]);
        }

        return redirect()->route('backlog')->with('success', 'Backlog updated successfully!');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'blg_pass_point' => 'required|numeric',
            'blg_bug' => 'required|string|max:255',
            'blg_cancel' => 'required|string|max:255',
            'blg_is_use' => 'required|boolean',
            'blg_uth_id' => 'required|integer',
            'blg_spr_id' => 'required|integer',
        ]);

        // Insert into the 'backlogs' table
        $backlogId = DB::table('backlogs')->insertGetId([
            'blg_pass_point' => $request->blg_pass_point,
            'blg_bug' => $request->blg_bug,
            'blg_cancel' => $request->blg_cancel,
            'blg_is_use' => $request->blg_is_use,
            'blg_uth_id' => $request->blg_uth_id,
            'blg_spr_id' => $request->blg_spr_id,
        ]);

        // Optionally, you can handle the related data, for example, updating other tables based on the inserted backlog
        // For example, handling points_current_sprint or other related data...

        return redirect()->route('backlog')->with('success', 'Backlog added successfully!');
    }

    public function add()
    {
        return view('pages.backlog.addBacklog');
    }

    public function create()
    {
        // Query to fetch data for the "create" form
        $backlogs = DB::table('backlogs')
            ->leftJoin('points_current_sprint', 'backlogs.blg_id', '=', 'points_current_sprint.pcs_id')
            ->leftJoin('sprints', 'points_current_sprint.pcs_spr_id', '=', 'sprints.spr_id')
            ->leftJoin('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
            ->leftJoin('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->leftJoin('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->select(
                'backlogs.blg_id',
                'teams.tm_id as tm_id',
                'teams.tm_name as tm_name',
                'users.usr_id as usr_id',
                'users.usr_username as usr_username',
                'sprints.spr_id as spr_id',
                'sprints.spr_year as spr_year', 
                'sprints.spr_number as spr_number',
                DB::raw('backlogs.blg_pass_point as blg_pass'),
                'backlogs.blg_bug',
                'backlogs.blg_cancel',
                DB::raw('(backlogs.blg_pass_point + backlogs.blg_bug + backlogs.blg_cancel) as blg_point_all')
            )
            ->get();

        return view('pages.backlog.addBacklog', compact('backlogs'));
    }
}
