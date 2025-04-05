<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamPerformanceController extends Controller
{
    public function TeamPerformance(){
        return view('pages.teamPerformance');
    }
}
