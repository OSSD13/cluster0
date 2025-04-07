<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
