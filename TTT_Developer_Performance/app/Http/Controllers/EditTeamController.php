<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditTeamController extends Controller
{
    public function index(){
        return view('pages.editTeam.');
    }
}
