<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function developer(){
        return view('pages.dashboard.dashboard');
    }

    function tester(){
        return view('pages.dashboard.testerDashboard');
    }

    function index() {
        $points = Points::all()->paginate(5);
        return view('pages.dashboard.testerDashboard', compact('points'));
    }

    function card() {
        return view('pages.chooseCard');
    }
}
