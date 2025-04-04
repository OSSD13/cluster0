<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateNewTeamController extends Controller
{
    public function index(){
        return view('pages.createNewTeam');
    }
}