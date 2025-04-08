<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
class MinorcaseController extends Controller
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
            ['points.pts_type', '=', 'minor_case'],
            ['points.pts_is_use', '=', 1]
        ])
        ->get();
        return view('pages.minorCase.minorcase', compact('points'));
    }

    public function add(){
       $users = DB::table('users')
        ->where('usr_is_use', '=', 1)
        ->where('usr_role', '=', 'Developer')
        ->select('usr_id as id', 'usr_name as name')
        ->get();
        $teams = DB::table('teams')
        ->where('tm_is_use', '=', 1)
        ->select('tm_id as id', 'tm_name as name')
        ->get();
        $years = DB::table('sprints')
            ->select('spr_year as year')
            ->distinct('spr_year')
            ->get();
        $sprints = DB::table('sprints')
            ->select('spr_number as number')
            ->distinct('spr_number')
            ->get();

        return view(('pages.minorCase.addMinorcase') , compact('users', 'teams' , 'years' , 'sprints'));

    }

public function store(Request $request){
    $request->validate([
        'member' => 'required',
        'your_point' => 'required|numeric|min:0|max:100',
        'team' => 'required',
        'sprint_year' => 'required',
        'sprint_num' => 'required',

        
    ]);

    $minorcase = new Point;

    $minorcase->pts_value = $request->your_point;
    $minorcase->pts_uth_id = $request->member;
    $minorcase->mcn_card_detail =  ;
    $minorcase->mnc_defect_detail = ;
    $mnc_point->
    
    $minorcase->save();
    return redirect()->route('Minorcase')->with('success', 'Minorcase added successfully.');

}


    public function delete($id){
    // ค้นหาข้อมูล Point โดยใช้ ID
    $point = Point::find($id);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if (!$point) {
        return redirect()->route('Minorcase')->with('error', 'Minorcase not found.');
    }

    // ตรวจสอบว่า data ถูกลบไปแล้วหรือยัง
    if ($point->pts_is_use == 0) {
        return redirect()->route('Minorcase')->with('error', 'Minorcase already deleted.');
    }

    // เปลี่ยนค่า pts_is_use เป็น 0 เพื่อทำ Soft Delete
    $point->pts_is_use = 0;
    $point->save();

    return redirect()->route('Minorcase')->with('success', 'Minorcase deleted successfully.');
}

}