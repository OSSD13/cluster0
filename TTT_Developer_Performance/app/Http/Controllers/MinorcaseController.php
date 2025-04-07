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
    public function edit(){
        return view('pages.minorCase.editMinorcase');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'member' => 'required|string',
            'point' => 'required|numeric',
            'current_team' => 'required|string',
            'sprint_year' => 'required|numeric',
            'sprint_num' => 'required|numeric',
        ]);
        try {
        // find uth_id by member and current_team
        $uth_id = DB::table('user_team_history')
        ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
        ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
        ->where([
            ['users.usr_id', '=', $validated['member']],
            ['teams.tm_id', '=', $validated['current_team']],
            ['user_team_history.uth_end_date', '=', null]
        ])
        ->value('user_team_history.uth_id');

    $point = new Point();
    $point->pts_created_time = now();
    $point->pts_type = 'extra';
    if ($uth_id != null) {
        // Set the uth_id if found
        $point->pts_uth_id = $uth_id;
    } else {
        //Set uth_end_date to now
        DB::table('user_team_history')
            ->where('uth_usr_id', '=', $validated['member'])
            ->orderBy('uth_id', 'desc')
            ->limit(1)
            ->update([
                'uth_end_date' => now()
            ]);
        //create new user_team_history
        $uth = DB::table('user_team_history')->insertGetId([
            'uth_usr_id' => DB::table('users')->where('usr_id', $validated['member'])->value('usr_id'),
            'uth_tm_id' => DB::table('teams')->where('tm_id', $validated['current_team'])->value('tm_id'),
            'uth_start_date' => now()
        ]);
        $point->pts_uth_id = $uth;
    }
    $point->pts_updated_time = now();
    $point->pts_value = $validated['point_all'];
    $point->pts_is_use = 1;
    $point->pts_version_id = DB::table('versions')->latest('ver_id')->value('ver_id');
    $point->pts_spr_id = DB::table('sprints')->latest('spr_id')->value('spr_id');
    $point->save();
    return redirect()->route('minorcase')->with('success', 'Extrapoint created successfully!');
} catch (Exception $e) {
    // แสดงข้อผิดพลาดในหน้าเว็บ
    return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);

}
    }
    public function delete($id)
{
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
