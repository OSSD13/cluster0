<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinorcaseController extends Controller
{
    public function index(){
        return view('pages.minorcase');
    }
}
