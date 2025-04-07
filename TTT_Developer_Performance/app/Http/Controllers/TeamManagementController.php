<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeamHistory;

class TeamManagementController extends Controller
{
    public function index(){
        // $teams = DB::table('teams')
        // ->join('user_team_history', 'teams.tm_id', '=', 'user_team_history.uth_tm_id')
        // ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
        // ->select(
        //     'teams.tm_id',
        //     'teams.tm_name',
        //     DB::raw('COUNT(CASE WHEN user_team_history.uth_is_current = 1 THEN 1 END) as members_count'),
        //     DB::raw('MIN(user_team_history.uth_start_date) as created_at')
        // )
        // ->groupBy('teams.tm_id', 'teams.tm_name')
        // ->get();
    
    return view('pages.teamManagment');
    
}

    // หน้าเพิ่มทีมใหม่
    public function add(){
        return view('pages.createNewTeam');
    }

    // หน้าแก้ไขทีม
    public function edit(){
         // ดึงข้อมูลทีมที่จะแก้ไข
        return view('pages.editTeam');
    }
}