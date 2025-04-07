<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Point;

use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index(){
        $points = DB::table('points')
        ->join('user_team_history','points.pts_uth_id' , '=', 'user_team_history.uth_id')
        ->join ('teams','user_team_history.uth_tm_id' , '=', 'tm_id')
        ->join ('users','user_team_history.uth_usr_id' , '=', 'usr_id')
        ->join ('sprints','points.pts_spr_id' , '=', 'spr_id')
        ->select(
            'points.pts_value as value',
            'points.pts_id as id',
            'users.usr_name as member',
            'teams.tm_name as team',
            'sprints.spr_year as sprint_year',
            'sprints.spr_number as sprint_num',
        )
        ->where([
            ['points.pts_type', '=', 'backlog'],
            ['points.pts_is_use', '=', 1]
        ])
        ->get();
        return view('pages.backlog.backlog', compact('points'));
    }

    public function add(){
        return view('pages.backlog.addBacklog');
    }

    public function edit(){
        return view('pages.backlog.editBacklog');
    }

}
