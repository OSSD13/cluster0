<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function defaultConfiguration()
    {
        $json = Storage::disk('local')->get('config/defaultPassword.json');
        $config = json_decode($json, true);

        return view('pages.defaultConfiguration', ['configData' => $config]);
    }

    // ✅ ฟังก์ชันสำหรับบันทึก JSON
    public function saveConfiguration(Request $request)
    {
        $data = ['defaultPassword' => $request->input('defaultPassword')];

        Storage::disk('local')->put('config/defaultPassword.json', json_encode($data, JSON_PRETTY_PRINT));

        return response()->json();
    }
}
