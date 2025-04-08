<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')
            ->join('user_team_history', 'teams.tm_id', '=', 'user_team_history.uth_tm_id')
            ->select(
                'teams.tm_id as id',
                'teams.tm_name as name',
                'user_team_history.uth_start_date as start_date',
                'user_team_history.uth_end_date as end_date'
            )
            ->where('teams.tm_is_use', '=', 1)
            ->where('user_team_history.uth_is_current', '=', 1)
            ->where('user_team_history.uth_end_date', '>=', now())
            ->get();

        return view('pages.teams.teamManagment', compact('teams'));
    }

    public function add()
    {
        return view('pages.teams.createNewTeam');
    }

    public function edit()
    {
        return view('pages.teams.editTeam');
    }
}
