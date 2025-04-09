<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PointCurrentSprint;
use App\Models\UserTeamHistory;
use App\Models\Team;
use App\Models\Users;

class DashboardController extends Controller
{
    function developer(){
        return view('pages.dashboard.dashboard');
    }

    public function tester(){
        // ดึงข้อมูลจาก DB ตามที่ต้องการ
        $allPoints = DB::table('points_current_sprint')
            ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
            ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->select(
                'usr_username',
                'pcs_pass',
                'pcs_bug',
                'pcs_cancel',
                DB::raw('(pcs_pass + pcs_bug - pcs_cancel) AS point_all')
            )
            ->get();

        // คำนวณ total values
        $totalPointAll = $allPoints->sum('pcs_pass') + $allPoints->sum('pcs_bug') + $allPoints->sum('pcs_cancel');
        $totalPass = $allPoints->sum('pcs_pass');
        $totalBug = $allPoints->sum('pcs_bug');
        $totalCancel = $allPoints->sum('pcs_cancel');
        $teamAmount = Team::all()->count();  // จำนวนทีม

        // สร้าง array สำหรับ chart
        $chartData = [
            'Point_All' => $allPoints->pluck('point_all'),
            'Pass' => $allPoints->pluck('pcs_pass'),
            'Bug' => $allPoints->pluck('pcs_bug'),
            'categories' => $allPoints->pluck('usr_username'),
        ];

        $personal = DB::table('points_current_sprint')
        ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
        ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
        ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id') // เข้าร่วมตาราง teams เพื่อดึงชื่อทีม
        ->select(
            'users.usr_username',
            DB::raw('(pcs_pass + pcs_bug - pcs_cancel) AS point_all'),
            'pcs_pass',
            'pcs_bug',
            'teams.tm_name AS team'
        )
        ->get();

        // ส่งข้อมูลไปยัง view
        return view('pages.dashboard.testerDashboard', compact('chartData', 'totalPointAll', 'totalPass', 'totalBug', 'totalCancel', 'teamAmount', 'personal'));
    }

    function index() {
        $points = Points::all()->paginate(5);
        return view('pages.dashboard.testerDashboard', compact('points'));
    }

    function card() {
        return view('pages.chooseCard');
    }


}
