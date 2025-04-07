<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index(){
        return view('pages.teams.teamManagment');
    }

    public function add(){
        return view('pages.teams.createNewTeam');
    }

    public function edit(){
        return view('pages.teams.editTeam');
    }
}
