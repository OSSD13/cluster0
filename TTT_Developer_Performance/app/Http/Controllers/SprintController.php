<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(){
        return view('pages.sprint.listSprint');
    }
}
