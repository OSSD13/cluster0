<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Teams;
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
        $teams = Teams::all();

        // ส่งให้หน้า view
        return view('pages.members.memberlistEdit', [
            'usr_name' => $user->usr_name,
            'usr_trello_fullname' => $user->usr_trello_fullname

        ]);
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
    public function add() {
        return view('pages.members.memberlistAdd');
    }
}
