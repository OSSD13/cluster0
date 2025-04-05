<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinorcaseController extends Controller
{
    public function index(){
        return view('pages.minorcase');
    }
    public function add(){
        return view('pages.addMinorcase');
    }
    public function edit(){
        return view('pages.editMinorcase');
    }
}
