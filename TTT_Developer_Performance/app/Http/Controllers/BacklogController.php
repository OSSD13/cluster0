<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index(){
        return view('pages.backlog.backlog');
    }

    public function add(){
        return view('pages.backlog.addBacklog');
    }

    public function edit(){
        return view('pages.backlog.editBacklog');
    }

}
