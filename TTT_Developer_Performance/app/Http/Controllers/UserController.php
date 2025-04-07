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
        $users = Users::where('usr_is_use', 1)->paginate(5);
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
        $userId = $request->input('userId');
        $defaultPassword = json_decode(Storage::disk('local')->get('config/defaultPassword.json'), true)['defaultPassword'];

        // Update the user's password in the database
        // Assuming you have a User model and you're using Eloquent ORM
        $user = \App\Models\User::find($userId);
        if ($user) {
            $user->usr_password = bcrypt($defaultPassword);
            $user->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }
    }
}
