<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

use App\Models\UserTeamHistory;

class MemberListController extends Controller
{
    public function index()
    {
        $histories = UserTeamHistory::with(['user', 'team'])
            ->whereHas('user', function ($query) {
                $query->where('usr_is_use', 1);
            })
            ->get();


        return view('pages.members.memberlist', compact('histories'));
    }


    public function edit($id)
    {
        // ดึงข้อมูล user ตาม id
        $user = Users::findOrFail($id);
        $teams = Team::all();

        // ดึง team ล่าสุดของ user จาก table user_team_history (ตาม uth_usr_id)
        $lastTeamId = DB::table('user_team_history')
            ->where('uth_usr_id', $user->usr_id)
            ->orderByDesc('uth_id') // ถ้ามี column id (หรือ timestamp) ใช้จัดเรียงจากล่าสุด
            ->value('uth_tm_id'); // คืนค่า team_id


        return view('pages.members.memberlistEdit', compact('user', 'teams', 'lastTeamId'));
    }

    public function update(Request $request, $id)
    {
        $request->all();

        DB::table('users')
            ->where('usr_id', $id)
            ->update([
                'usr_name' => $request->usr_name,
                'usr_trello_fullname' => $request->trello_fullname,
            ]);

        DB::table('user_team_history')
            ->where('uth_usr_id', $id)
            ->update([
                'uth_tm_id' => $request->team_id,
            ]);

        return redirect('memberlist');
    }

    public function delete($id)
    {
        // ดึงข้อมูล user ตาม id
        $user = Users::findOrFail($id);

        // ลบข้อมูล user

        $user->usr_is_use = 0;
        $user->save();

        // Redirect ไปยังหน้า memberlist
        return redirect()->route('memberlist');
    }

    public function add()
    {
        return view('pages.members.memberlistAdd');
    }
}
