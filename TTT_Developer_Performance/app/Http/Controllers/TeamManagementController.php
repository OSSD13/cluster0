<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Team;


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
            DB::raw('MIN(user_team_history.uth_start_date) as created'),
            DB::raw('COUNT(user_team_history.uth_usr_id) as current')
        )
        ->groupBy('teams.tm_id', 'teams.tm_name')
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

public function store(Request $request)
{
    // การตรวจสอบความถูกต้องของข้อมูลที่รับมาจากฟอร์ม
    $request->validate([
        'team_name' => 'required|string',
        'trello_board' => 'required|string',
        'team_members' => 'required|array',
        'team_members.*' => 'exists:users,usr_username', // ตรวจสอบว่า username ที่ส่งมามีอยู่ในฐานข้อมูล
        'trc_id' => 'required|integer',
        'stl_id' => 'required|integer',
    ]);

    // การสร้างทีมใหม่ในตาราง teams
    $teamId = DB::table('teams')->insertGetId([
        'tm_name' => $request->team_name,
        'tm_trello_boardname' => $request->trello_board,
        'tm_is_use' => 1,
        'tm_stl_id' => $request->stl_id,
        'tm_trc_id' => $request->trc_id,
    ]);

    // เพิ่มสมาชิกให้กับทีมในตาราง user_team_history
    foreach ($request->team_members as $username) {
        $userId = DB::table('users')->where('usr_username', $username)->value('usr_id');

        // ตรวจสอบว่าผู้ใช้ที่ถูกเลือกมีอยู่จริง
        if ($userId) {
            DB::table('user_team_history')->insert([
                'uth_tm_id' => $teamId,
                'uth_usr_id' => $userId,
                'uth_is_current' => 1,  // ผู้ใช้คนนี้เป็นสมาชิกในทีม
                'uth_start_date' => Carbon::now(),  // วันที่เริ่มต้นการเข้าร่วมทีม
            ]);
        }
        return redirect()->route('team')->with('success', 'Team updated successfully');
    }

    // ส่งข้อความสำเร็จหลังจากสร้างทีม
    return redirect()->route('team')->with('success', 'Team created successfully!');
}


    public function edit($id)
    {
        $team = DB::table('teams')->where('tm_id', $id)->first();

        $users = DB::table('users')
            ->select('usr_id as id', 'usr_username as username')
            ->get();

        $apis = DB::table('trello_credentials')
            ->select('trc_id as id', 'trc_name as name')
            ->get();

        $settings = DB::table('setting_trello')
            ->select('stl_id as id', 'stl_name as name')
            ->get();

        $currentMembers = DB::table('user_team_history')
            ->where('uth_tm_id', $id)
            ->where('uth_is_current', 1)
            ->pluck('uth_usr_id')
            ->toArray();

        $currentMembersUsernames = DB::table('users')
            ->whereIn('usr_id', $currentMembers)
            ->pluck('usr_username')
            ->toArray();

        return view('pages.teams.editTeam', compact(
            'team', 'users', 'apis', 'settings', 'currentMembers', 'currentMembersUsernames'
        ));
    }


    public function update(Request $request, $id)
{
    // Update ข้อมูล team
    DB::table('teams')
        ->where('tm_id', $id)
        ->update([
            'tm_name' => $request->team_name,
            'tm_trello_boardname' => $request->trello_board,
            'tm_trc_id' => $request->api_id,
            'tm_stl_id' => $request->setting_id,
        ]);

    // ตรวจสอบว่า team_members เป็น array หรือไม่
    $usernames = is_array($request->team_members) ? $request->team_members : explode(',', $request->team_members);
    $userIds = DB::table('users')
        ->whereIn('usr_username', $usernames)
        ->pluck('usr_id')
        ->toArray();

    // ปิดสมาชิกเดิม (uth_is_current = 0)
    DB::table('user_team_history')
        ->where('uth_tm_id', $id)
        ->where('uth_is_current', 1)
        ->update(['uth_is_current' => 0, 'uth_end_date' => now()]);

    // เพิ่มสมาชิกใหม่
    foreach ($userIds as $userId) {
        DB::table('user_team_history')->insert([
            'uth_usr_id' => $userId,
            'uth_tm_id' => $id,
            'uth_start_date' => now(),
            'uth_is_current' => 1,
        ]);
    }

    return redirect()->route('team')->with('success', 'Team updated successfully');
}

    public function delete($id)
{
    // ดึงข้อมูล team ตาม id
    $team = Team::findOrFail($id);

    // อัปเดตสถานะทีมก่อน (ถ้าจำเป็น)
    $team->tm_is_use = 0;
    $team->save();

    // ลบข้อมูล user_team_history ที่เกี่ยวข้อง
    DB::table('user_team_history')->where('uth_tm_id', $id)->delete();



    // Redirect ไปยังหน้า team
    return redirect()->route('team')->with('success', 'ทีมถูกลบเรียบร้อยแล้ว');
}




}
