<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;


class TeamPerformanceController extends Controller
{
    public function card(){
        $cards = Card::All();
        return view('pages/dashboard/teamPerformance',compact('cards'));
    }
}
