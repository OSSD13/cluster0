<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function myProfile(){
        return view('pages.myProfile');
    }

    function changePassword(){
        return view('pages.changePassword');
    }

    function editProfile($id){
        $user = User::find($id);
        return view('pages.setting.myProfile',compact('user'));
    }

    function editProfile_action(Request $req){
        $muser = User::find($req->id);
        $muser->usr_name = $req->name;
        $muser->usr_email = $req->email;
        $muser-> save();
        return redirect('/myprofile');
    }
}
