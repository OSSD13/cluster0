<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeamHistory;
use App\Models\User;

class TeamManagementController extends Controller
{
    // แสดงหน้ารวมทีม
    public function index(){
        // $points = DB::table('teams')
        //     ->join('user_team_history', 'teams.tm_id', '=', 'user_team_history.uth_tm_id')
        //     ->select(
        //         'team.tm_name as teamname',
        //         'Count(user_team_history.is_current = 1'
        //     )
        //     ->where([
        //         ['points.pts_type', '=', 'extra'],
        //         ['points.pts_is_use', '=', 1]
        //     ])
        //     ->get();
        // return view('pages.extrapoint.list', compact('points'));
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
//บันทึกทีมใหม่
    // public function store(Request $request){
    //     $request->validate([
    //         'tm_name' => 'required|string|max:255',
    //         'tm_is_use' => 'required|boolean',
    //         'tm_stl_id' => 'required|integer',
    //         'tm_trello_boardname' => 'nullable|string|max:255',
    //     ]);

    //     Team::create([
    //         'tm_name' => $request->tm_name,
    //         'tm_is_use' => $request->tm_is_use,s
    //         'tm_stl_id' => $request->tm_stl_id,
    //         'tm_trello_boardname' => $request->tm_trello_boardname,
    //     ]);

    //     return redirect()->route('teams.index')->with('success', 'Team added successfully!');
    // }
}
