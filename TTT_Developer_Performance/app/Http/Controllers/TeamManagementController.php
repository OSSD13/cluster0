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
        // ดึงข้อมูลทีม
        $team = DB::table('teams')->where('tm_id', $id)->first();
    
        // ดึงผู้ใช้ทั้งหมด
        $users = DB::table('users')
            ->select('usr_id as id', 'usr_username as username')
            ->get();
    
        // ดึง API Trello ทั้งหมด
        $apis = DB::table('trello_credentials')
            ->select('trc_id as id', 'trc_name as name')
            ->get();
    
        // ดึง Trello Setting ทั้งหมด
        $settings = DB::table('setting_trello')
            ->select('stl_id as id', 'stl_name as name')
            ->get();
    
        // ดึงสมาชิกปัจจุบันของทีมนี้
        $currentMembers = DB::table('user_team_history')
            ->where('uth_tm_id', $id)
            ->where('uth_is_current', 1)
            ->pluck('uth_usr_id') // ดึงเฉพาะ ID
            ->toArray();
    
        return view('pages.teams.createNewTeam', compact('team', 'users', 'apis', 'settings', 'currentMembers'));
    }
    
    public function update(){

    } 
    public function destroy($id)
{
    // ลบข้อมูลสมาชิกทีมก่อน
    DB::table('user_team_history')->where('uth_tm_id', $id)->delete();

    // แล้วค่อยลบทีม
    DB::table('teams')->where('tm_id', $id)->delete();

    return redirect()->route('team')->with('success', 'ลบทีมเรียบร้อยแล้ว');
}


}
