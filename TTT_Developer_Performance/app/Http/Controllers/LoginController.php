<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $req)
    {
        // ตรวจสอบค่าที่รับเข้ามา
        $validated = $req->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'remember' => 'nullable|boolean', // เช็คว่ามี remember หรือไม่
        ]);

        // ค้นหาผู้ใช้จาก username หรือ email
        $user = Users::where('usr_username', $validated['username'])
                    ->orWhere('usr_email', $validated['username'])
                    ->first();

        // ตรวจสอบรหัสผ่าน
        if ($user && Hash::check($validated['password'], $user->usr_password)) {
            
            // สร้าง session สำหรับเข้าสู่ระบบ
            session(['user_id' => $user->id]);

            // ถ้าติ๊ก Remember ให้เข้ารหัสและเก็บลง session
            if ($req->has('remember') && $req->remember) {
                session([
                    'remember_token' => Crypt::encryptString($user->id), // เข้ารหัส ID ของ user
                ]);
            }
            return view('home', compact('user'));
        } else {
            return back('login')->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['remember_token']); // ลบ remember token
        return redirect()->route('login'); // กลับไปหน้า Login
    }

}