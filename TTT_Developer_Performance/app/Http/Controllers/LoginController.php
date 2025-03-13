<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'usr_username' => 'required',
            'usr_password' => 'required|min:8',
        ]);

        $user = User::where('usr_username', $req->username)->first();
        $remember = $req->has('remember');

        if ($user && Hash::check($req->password, $user->password)) {
            Auth::login($user, $remember);

            // แสดงหน้า blank พร้อมข้อมูลผู้ใช้
            return view('blank', ['user' => Auth::user()]);
        } else {
            return back()->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
}
