<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index()
    {
        $backlogs = DB::table('points_current_sprint')
            ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
            ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->join('sprints', 'points_current_sprint.pcs_spr_id', '=', 'sprints.spr_id')
            ->join('backlogs', 'points_current_sprint.pcs_blg_id', '=', 'backlogs.blg_id')
            ->select(
                'points_current_sprint.pcs_id as id',
                'users.usr_name as member',
                'teams.tm_name as team',
                'sprints.spr_year as sprint_year',
                'sprints.spr_number as sprint_num',
                'backlogs.blg_pass_point as test_pass',
                'backlogs.blg_bug as bug',
                'backlogs.blg_cancel as cancel'
            )
            ->where('points_current_sprint.pcs_is_use', 1)
            ->where('backlogs.blg__is_use', 1)
            ->get();

        return view('pages.backlog.backlog', compact('backlogs'));
    }



    public function add()
    {
        return view('pages.backlog.addBacklog');
    }

    public function edit()
    {
        return view('pages.backlog.editBacklog');
    }
}
