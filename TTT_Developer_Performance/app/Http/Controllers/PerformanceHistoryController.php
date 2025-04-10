<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PointCurrentSprint;


class PerformanceHistoryController extends Controller
{
    //
    function index()
    {
        $pointsCurrentSprint = PointCurrentSprint::query()
            ->leftjoin('sprints', 'sprints.spr_id', 'points_current_sprint.pcs_spr_id')
            ->leftjoin('user_team_history', 'user_team_history.uth_id', 'points_current_sprint.pcs_uth_id')
            ->leftjoin('users', 'user_team_history.uth_usr_id', 'usr_id')
            ->leftjoin('teams', 'user_team_history.uth_tm_id', 'tm_id')
            ->get();
            


        return view('pages.dashboard.performanceHistory', compact('pointsCurrentSprint'));
    }
}
