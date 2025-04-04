<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceHistoryController extends Controller
{
    //
    function index()
    {
        return view('pages.performanceHistory');
    }
}
