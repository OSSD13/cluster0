<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtrapointController extends Controller
{
    function index()
    {
        return view('pages.extrapoint.list');
    }
    function create()
    {
        return view('pages.extrapoint.add');
    }
    function edit()
    {
        return view('pages.extrapoint.edit');
    }
    //
}
