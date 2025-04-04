<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinorcaseController extends Controller
{
    public function index(){
        return view('pages.minorcase');
    }
    public function addMinorcase(){
        return view('pages.addMinorcase');
    }
    public function editMinorcase(){
        return view('pages.editMinorcase');
    }
}
