<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserTeamHistory;

class MemberListController extends Controller
{
    public function index()
    {
        $histories = UserTeamHistory::with(['user', 'team'])->get();

        foreach ($histories as $history) {
            $history->uth_id;
            $history->user->usr_name;
            $history->team->tm_name;
            $history->user->usr_trello_name;
            $history->uth_start_date;
        }
        return view('memberlist', compact('histories'));
    }

    public function edit($id)
{
    $user = Users::findOrFail($id);  // ดึงข้อมูลคนที่จะแก้มา

    return view('memberlistEdit', compact('user'));  // ส่งข้อมูลไปหน้า view
}

}
