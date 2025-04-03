<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
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

    public function registerWithGooglePage(){
        return view('registerWithGoogle_step2');
    }

    public function step2(){
        return view('register_step2');
    }

    public function registerStep1(Request $req)
    {
        session([
            'usr_username' => $req->username,
            'usr_email' => $req->email,
            'usr_password' => bcrypt($req->password),
        ]);

        return view('register_step2');
    }

    public function registerStep2(Request $req)
    {
        $username = session('usr_username');
        $email = session('usr_email');
        $password = session('usr_password');

        $usr_name = $req->name;
        $usr_trello_fullname = null;
        $usr_role = null;

        $user = Users::create([
            'usr_username' => $username,
            'usr_email' => $email,
            'usr_password' => $password,
            'usr_name' => $usr_name,
            'usr_trello_fullname' => $usr_trello_fullname,
            'usr_role' => $usr_role,
            'usr_is_use' => 1,
        ]);
        session()->forget(['usr_username', 'usr_email', 'usr_password']);

        return redirect()->route('pending');
    }

    public function googleAuthentication()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = Users::where('usr_google_id', $googleUser->id)->first();
        if ($user) {
            return view('home', compact('user'));
        } else {
            session([
                'usr_google_id' => $googleUser->id
            ]);
            return view('registerWithGoogle_step2');
        }
    }

    public function googleAuthenticationStep2(Request $req)
    {
        $google_id = session('usr_google_id');

        $user = Users::create([
            'usr_username' => $req->username,
            'usr_email' => null,
            'usr_password' => bcrypt("TTT@1234"), 
            'usr_name' => $req->name,
            'usr_trello_fullname' => null,
            'usr_role' => null,
            'usr_is_use' => 1,
            'usr_google_id' => $google_id
        ]);

        session()->forget(['usr_google_id']);
        return redirect()->route('pending');
    }



}
