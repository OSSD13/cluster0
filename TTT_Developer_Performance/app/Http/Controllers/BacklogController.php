<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index(){
        return view('pages.backlog');
    }

    public function add(){
        return view('pages.addBacklog');
    }

    public function edit(){
        return view('pages.editBacklog');
    }


}
