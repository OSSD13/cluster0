<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Users;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
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
                    ->first();

        // ตรวจสอบรหัสผ่าน
        if ($user && Hash::check($validated['password'], $user->usr_password)) {
            return view('auth.home', compact('user'));
        } else {
            return view('auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['remember_token']);
        return redirect()->route('login');
    }

    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            //dd($googleUser);

            $user = Users::where('usr_google_id', $googleUser->id)->first();

            if ($user) {
                return view('home', compact('user'));
            } else {
                session([
                    'usr_google_id' => $googleUser->id
                ]);
                return view('registerWithGoogle_step2', compact('googleUser'));
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
