<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;


class TeamPerformanceController extends Controller
{
    public function card(){
        $cards = Card::All();
        return view('pages.teamPerformance',compact('cards'));
    }

    public function insertCard(){
        Card::create([
            'crd_trc_id' => 1,
            'crd_boardname' => 'Board1',
            'crd_listname' => 'List1',
            'crd_title' => 'Task Title',
            'crd_detail' => 'Detail of task',
            'crd_member_fullname' => 'nah',
            'crd_point' => 10
        ]);
        return redirect('pages.teamPerformance');
    // return redirect('/card');
}
}
