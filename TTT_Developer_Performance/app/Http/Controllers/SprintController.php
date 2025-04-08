<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(){
        return view('pages.sprint.sprintList');
    }

    public function add(){
        return view('pages.sprint.createSprint');
    }
    public function edit(){
        return view('pages.sprint.editSprint');
    }
}
