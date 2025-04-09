<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\PointCurrentSprint;
use App\Models\MinorCase;
use App\Models\Sprint;
use App\Models\Users;
use App\Models\Team;
use App\Models\UserTeamHistory;
use Illuminate\Support\Facades\DB;


class MinorcaseController extends Controller
{
    public function index()
    {
        $points = DB::select('SELECT spr_year, spr_number, usr_username, tm_name, mnc_point,mnc_card_detail,mnc_defect_detail
        FROM minor_cases
        JOIN points_current_sprint ON pcs_mnc_id = mnc_id
        JOIN sprints ON pcs_spr_id = spr_id
        JOIN user_team_history ON pcs_uth_id = uth_id
        JOIN users ON uth_usr_id = usr_id
        JOIN teams ON uth_tm_id = tm_id
        ');
        return view('pages.minorCase.minorcase', compact('points'));
    }

    public function add()
    {
        $users = Users::all();
        $teams = Team::all();
        $sprints = Sprint::all();
        $points = PointCurrentSprint::all();



        return view('pages.minorCase.addminorcase', compact('users' , 'teams'  ,'sprints', 'points'));
    }
    public function insert()
    {
        $minorcases = DB::table('minor_cases')->insert('SELECT spr_year, spr_number, usr_username, tm_name, mnc_point,mnc_card_detail,mnc_defect_detail
            FROM minor_cases
            JOIN points_current_sprint ON pcs_mnc_id = mnc_id
            JOIN sprints ON pcs_spr_id = spr_id
            JOIN user_team_history ON pcs_uth_id = uth_id
            JOIN users ON uth_usr_id = usr_id
            JOIN teams ON uth_tm_id = tm_id'
                        
        );
    
        return view('pages.minorCase.addminorcase', compact('minorcases'));
    }

    public function store(Request $request)
    {
        $user = Users::find($request->uth_usr_id);
        $team = Team::find($request->uth_tm_id);
        $sprint = Sprint::find($request->spr_number);

        $uth = UserTeamHistory::where('uth_usr_id', $user->usr_id)
            ->where('uth_tm_id', $team->tm_id)
            // ->where('uth_is_use', 1)
            ->first();

        $point = PointCurrentSprint::where('pcs_spr_id', $sprint->sprint_id)
            ->where('pcs_uth_id', $uth->uth_id)
            ->where('pcs_is_use', 1)
            ->first();

        if ($point) {
            // เพิ่ม Minor Case ใหม่และดึง ID ที่เพิ่ม
            $minorCaseId = DB::table('minor_cases')->insertGetId([
                'mnc_card_detail'   => $request->mnc_card_detail ?? null,
                'mnc_defect_detail' => $request->mnc_defect_detail ?? null,
                'mnc_point'         => $request->mnc_point,
                'mnc_is_use'        => 1,
            ]);

            // อัปเดต ID ของ minor case ไปยังตาราง pcs
            $point->pcs_mnc_id = $minorCaseId;
            $point->save();
        }
        return redirect()->route('minorcase')->with('success', 'Minorcase added successfully.');
    }
    
        public function edit($id){

        }
  
    public function delete($id)
    {
        $point = PointCurrentSprint::find($id);

        if (!$point) {
            return redirect()->route('minorcase')->with('error', 'Minorcase not found.');
        }

        if ($point->pcs_is_use == 0) {
            return redirect()->route('minorcase')->with('error', 'Minorcase already deleted.');
        }

        $point->pcs_is_use = 0;
        $point->save();

        return redirect()->route('minorcase')->with('success', 'Minorcase deleted successfully.');
    }
}