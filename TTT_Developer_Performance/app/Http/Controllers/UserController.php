<?php

namespace App\Http\Controllers;

use App\Models\UserTeamHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\Team;

class UserController extends Controller
{
    public function defaultConfiguration()
    {
        // Get the content of the JSON file
        $json = Storage::disk('local')->get('config\defaultPassword.json');

        // Decode the JSON data, if it's null, fallback to default
        $configData = json_decode($json, true) ?? ['defaultPassword' => ''];

        return view('pages.setting.defaultConfiguration', compact('configData'));
    }

    // ✅ ฟังก์ชันสำหรับบันทึก JSON
    public function saveConfiguration(Request $request)
    {
        $data = ['defaultPassword' => $request->input('defaultPassword')];

        Storage::disk('local')->put('config\defaultPassword.json', json_encode($data, JSON_PRETTY_PRINT));

        return response()->json();
    }

    public function manageUser()
    {
        $users = Users::where('usr_is_use', 1)->get();
        $teams = Team::where('tm_is_use', 1)->get();

        // เตรียมข้อมูลทีมปัจจุบันให้กับแต่ละ user
        foreach ($users as $user) {
            $history = UserTeamHistory::where('uth_usr_id', $user->usr_id)
                        ->where('uth_is_current', 1)
                        ->with('team')
                        ->first();

            $user->current_team_id = $history ? $history->team->tm_id : null;
            $user->current_team_name = $history ? $history->team->tm_name : '-';
        }

        return view('pages.setting.manageUser', compact('users', 'teams'));
    }

    public function resetPassword(Request $request)
    {
        $userId = $request->input('user_id');
        $defaultPassword = json_decode(Storage::disk('local')->get('config/defaultPassword.json'), true)['defaultPassword'];

        $user = \App\Models\User::find($userId);
        if ($user) {
            $user->usr_password = bcrypt($defaultPassword);
            $user->save();
            return redirect()->back()->with('success', 'Password reset successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }


    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,usr_id',
            'role' => 'nullable|in:Tester,Developer'
        ]);

        // ใช้ query builder แทน Eloquent save
        Users::where('usr_id', $request->user_id)->update([
            'usr_role' => $request->role
        ]);

        return redirect()->back()->with('success', 'Role updated successfully.');
    }


    public function updateTeam(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,usr_id',
            'team_id' => 'nullable|exists:teams,tm_id'
        ]);

        UserTeamHistory::create([
            'uth_usr_id' => $request->user_id,
            'uth_tm_id' => $request->team_id,
            'uth_start_date' => now(),
            'uth_end_date' => null,
            'uth_is_current' => 1
        ]);

        return redirect()->back()->with('success', 'Team updated successfully.');;
    }

    public function deleteUser(Request $request)
    {
        $userId = $request->input('user_id');

        // Update the user's status to inactive
        Users::where('usr_id', $userId)->update(['usr_is_use' => 0]);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
