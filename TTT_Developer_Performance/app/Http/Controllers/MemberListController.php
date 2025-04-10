<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Team;
use App\Models\UserTeamHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class MemberListController extends Controller
{
    public function index()
    {
        $histories = UserTeamHistory::with(['user', 'team'])
            ->where('uth_is_current', 1)
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
        $teams = Team::where('tm_is_use', 1)->get();

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

        return redirect('memberlist')->with('success', 'Members added successfully!');
    }

    public function delete($id)
    {
        // ดึงข้อมูล user ตาม id
        $user = UserTeamHistory::findOrFail($id);

        // ลบข้อมูล user

        $user->uth_is_current = 0;
        $user->uth_end_date = Carbon::now();

        $user->save();

        // Redirect ไปยังหน้า memberlist
        return redirect()->route('memberlist')->with('success', 'Members added successfully!');
    }
    public function dropdowngetData()
    {
        $teams = Team::where('tm_is_use', 1)->get();

        return view('pages.members.memberlistAdd', compact('teams'));
    }

    public function add(Request $request)
    {

        $validated = $request->validate([
            'members' => 'required|array|min:1',
            'members.*.name' => 'required|string',
            'members.*.username' => 'required|string',
            'members.*.trello_fullname' => 'required|string',
            'team_id' => 'required|exists:teams,tm_id',
        ], [
            'members.required' => 'Please add at least one member.',
            'members.*.name.required' => 'Please enter name for member #:position.',
            'members.*.username.required' => 'Please enter username for member #:position.',
            'members.*.trello_fullname.required' => 'Please enter Trello Fullname for member #:position.',
            'team_id.required' => 'Please select a team.',
            'team_id.exists' => 'The selected team is invalid.'
        ]);

        $defaultPassword = Hash::make('12345678'); // เปลี่ยนได้ตามต้องการ

        DB::beginTransaction();

        try {
            foreach ($validated['members'] as $member) {

                $userId = DB::table('users')->insertGetId([
                    'usr_username' => $member['username'],
                    'usr_password' => $defaultPassword,
                    'usr_name' => $member['name'],
                    'usr_trello_fullname' => $member['trello_fullname'],
                    'usr_is_use' => 1,
                    'usr_email' => null,
                    'usr_google_id' => null,
                    'usr_role' => null,
                    'usr_image' => null,

                ]);


                DB::table('user_team_history')->insert([
                    'uth_usr_id' => $userId,
                    'uth_tm_id' => $validated['team_id'],
                    'uth_start_date' => Carbon::now(),
                    'uth_end_date' => null,
                    'uth_is_current' => 1,
                ]);
            }

            DB::commit();

            return redirect('memberlist')->with('success', 'Members added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
        // Redirect ไปยังหน้า memberlist
    }
}
