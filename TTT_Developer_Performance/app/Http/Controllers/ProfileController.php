<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function myProfile(){
        return view('pages.myProfile');
    }

    function changePassword(){
        return view('pages.changePassword');
    }
}
