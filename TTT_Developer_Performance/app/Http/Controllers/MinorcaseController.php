<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinorcaseController extends Controller
{
    public function index(){
        return view('pages.minorCase.minorcase');
    }
    public function add(){
        return view('pages.minorCase.addMinorcase');
    }
    public function edit(){
        return view('pages.minorCase.editMinorcase');
    }
}
