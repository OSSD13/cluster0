<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index(){
        return view('pages.teamManagment');
    }

    public function add(){
        return view('pages.createNewTeam');
    }

    public function edit(){
        return view('pages.editTeam.');
    }
}
