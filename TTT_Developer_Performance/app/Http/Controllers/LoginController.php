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
            'username' => 'required',
            'password' => 'required|min:8',
        ]);
    
        $user = User::where('username', $req->username)->first();
        $remember = $req->has('remember'); 
    
        if ($user && Hash::check($req->password, $user->password)) {
            
            Auth::login($user, $remember);
    
            // แสดงหน้าขาว
            return response()->view('blank');
        } else {
            return back()->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
}