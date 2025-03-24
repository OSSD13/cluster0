<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ตรวจสอบ session สำหรับ user_id
        $user_id = session('user_id');
        if ($user_id) {
            // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
            $user = Users::find($user_id);
            return view('home', compact('user')); // ส่งข้อมูลผู้ใช้ไปยังหน้า home
        }

        // ถ้าไม่มี session ให้ไปหน้า login
        return redirect()->route('login');
    }

}
