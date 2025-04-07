<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;

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
        $users = Users::all();
        return view('pages.manageUser', ['users' => $users]);
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
