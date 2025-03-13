<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function validation(Request $request)
    {
        // // ตรวจสอบข้อมูลที่ส่งมา
        // $validator = Validator::make($request->all(), [
        //     'usr_username' => 'required|string|max:',
        //     'usr_email' => 'required|string|email|max:255|unique:users',
        //     'usr_password' => 'required|string|min:8|confirmed', // ต้องมี password_confirmation
        // ]);

        // // ถ้ามีข้อผิดพลาด
        // return redirect()->back()->withErrors($validator)->withInput();


        // บันทึกข้อมูลผู้ใช้ลงฐานข้อมูล
        $user = User::create([
            'usr_username' => $request->username,
            'usr_email' => $request->email,
            'usr_password' => $request->password,
            'usr_name' => $request->usr_name ?? 'unknow', // เพิ่ม usr_name
            'usr_trello_name' => $request->usr_trello_name ?? null,
            'usr_role' => $request->usr_role ?? 'Developer' // เข้ารหัสรหัสผ่าน
        ]);

        // ส่งกลับข้อมูลผู้ใช้
        return redirect('/login');
    }
}
