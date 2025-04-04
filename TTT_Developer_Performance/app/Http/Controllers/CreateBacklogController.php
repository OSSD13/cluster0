<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateBacklogController extends Controller
{
    public function index(){
        return view('pages.addBacklog');
    }
}
