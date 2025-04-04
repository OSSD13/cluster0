<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtrapointController extends Controller
{
    function index()
    {
        return view('pages.extrapoint');
    }
    function create()
    {
        return view('pages.createExtrapoint');
    }
    //
}
