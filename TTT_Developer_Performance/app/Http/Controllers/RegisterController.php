<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use DB;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function pendingPage(){
        return view('pending');
    }

    public function step2(){
        return view('register_step2');
    }

    public function registerStep1(Request $req)
    {
        // เก็บข้อมูลที่กรอกจาก Step 1 ลงใน Session
        session([
            'usr_username' => $req->username,
            'usr_email' => $req->email,
            'usr_password' => bcrypt($req->password), // ใช้ bcrypt เพื่อเข้ารหัสรหัสผ่าน
        ]);

        return view('register_step2');
    }

    public function registerStep2(Request $req)
    {
        // ดึงข้อมูลจาก Session ที่เก็บจาก Step 1
        $username = session('usr_username');
        $email = session('usr_email');
        $password = session('usr_password');

        // ข้อมูลที่กรอกจาก Step 2
        $usr_name = $req->name;
        $usr_trello_fullname = null;
        $usr_role = null; // ค่าเริ่มต้นเป็น 'Developer'

        // แทรกข้อมูลทั้งหมดลงในตาราง users โดยใช้ Eloquent
        $user = Users::create([
            'usr_username' => $username,
            'usr_email' => $email,
            'usr_password' => $password,
            'usr_name' => $usr_name,
            'usr_trello_fullname' => $usr_trello_fullname,
            'usr_role' => $usr_role,
            'usr_is_use' => 1
        ]);

        // ลบข้อมูลจาก Session หลังจากแทรกข้อมูลแล้ว
        session()->forget(['usr_username', 'usr_email', 'usr_password']);

        // แสดงผลลัพธ์หรือหน้าอื่น ๆ ที่ต้องการ
        return redirect()->route('pending');
    }

}
