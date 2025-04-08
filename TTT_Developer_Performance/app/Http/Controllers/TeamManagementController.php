<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')
    ->join('user_team_history', function ($join) {
        $join->on('teams.tm_id', '=', 'user_team_history.uth_tm_id')
             ->where('user_team_history.uth_is_current', '=', 1);
    })
    ->where('teams.tm_is_use', '=', 1)
    ->select(
        'teams.tm_id as id',
        'teams.tm_name as name',
        'teams.trc_created_time as created',
        DB::raw('COUNT(user_team_history.uth_id) as current')
    )
    ->groupBy('teams.tm_id', 'teams.tm_name', 'teams.trc_created_time')
    ->get();

return view('pages.teams.teamManagment', compact('teams'));
    }

    public function add(){
        $users = DB::table('users')
        ->select('usr_id as id','usr_username as username')
        ->get();

        $apis = DB::table('trello_credentials')
        ->select('trc_id as id',
        'trc_name as name')
        ->get();

        $settings = DB::table('setting_trello')
        ->select('stl_id as id',
        'stl_name as name')
        ->get();
    
    return view('pages.teams.createNewTeam', compact('users','apis','settings'));
    }

    public function store(Request $request){
        
        $request->validate([
            'team_name' => 'required|string',
            'trello_board' => 'required|string',
            'team_members' => 'required|array',
            'trc_id' => 'required|integer',
            'stl_id' => 'required|integer',
        ]);

        // Insert ทีมใหม่
        $teamId = DB::table('teams')->insertGetId([
            'tm_name' => $request->team_name,
            'tm_trello_boardname' => $request->trello_board,
            'tm_is_use' => 1,
            'tm_stl_id' => $request->stl_id,
            'trc_id' => $request->trc_id,
        ]);

        // เพิ่มสมาชิกใน user_team_history
        foreach ($request->team_members as $userId) {
            DB::table('user_team_history')->insert([
                'uth_tm_id' => $teamId,
                'uth_usr_id' => $userId,
                'uth_is_current' => 1,
            ]);
        }

        return redirect()->route('team')->with('success', 'Team created successfully!');
    }

    public function edit($id)
    {
        return view('pages.teams.editTeam');
    }
    public function destroy($id)
    {
        // ลบข้อมูลในฐานข้อมูล
        DB::table('team')->where('tm_id', $id)->delete();

        // Redirect กลับไปที่หน้า backlog พร้อมข้อความ success
        return redirect()->route('team')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
