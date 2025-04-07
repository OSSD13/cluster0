<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function updateName(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับมา
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // ดึงข้อมูล User ปัจจุบัน
        $user = Auth::user();
        $user->name = $request->name; // อัปเดตชื่อใหม่
        // $user->save(); // บันทึกลงฐานข้อมูล

        return redirect();
    }

    public function addName(){
        return view('register');
    }

    public function validation(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // ต้องมี password_confirmation
        ]);

        // ถ้ามีข้อผิดพลาด
        return redirect()->back()->withErrors($validator)->withInput();


        // บันทึกข้อมูลผู้ใช้ลงฐานข้อมูล
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // เข้ารหัสรหัสผ่าน
        ]);

        // ส่งกลับข้อมูลผู้ใช้
        return redirect()->route('inputName');
    }
}
