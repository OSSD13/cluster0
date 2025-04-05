<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function developer(){
        return view('pages.dashboard');
    }

    function tester(){
        return view('pages.testerDashboard');
    }
}
