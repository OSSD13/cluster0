<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        
        $user = User::where('username', $req->username)->first();

       
        if ($user && Hash::check($req->password, $user->password)) {
            $req->session()->put('user', $user);

            return redirect('/users');
        } else {
            return back()->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
}
