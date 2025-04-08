<?php

namespace App\Http\Controllers;

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
        // Join tables and retrieve data
        $points = MinorCase::join('points_current_sprint', 'minor_cases.mnc_id', '=', 'points_current_sprint.pcs_mnc_id')
            ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
            ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->join('sprints', 'points_current_sprint.pcs_spr_id', '=', 'sprints.spr_id')
            ->select(
                'points_current_sprint.pcs_id as id',
                'points_current_sprint.pcs_pass as value',
                'users.usr_name as member',
                'teams.tm_name as team',
                'sprints.spr_year as sprint_year',
                'sprints.spr_number as sprint_num',
                'minor_cases.mnc_card_detail as card_detail',
                'minor_cases.mnc_defect_detail as defect_detail'
            )
            ->where([
                ['points_current_sprint.pcs_is_use', '=', 1],
                ['minor_cases.mnc_is_use', '=', 1]
            ])
            ->get();

        return view('pages.minorCase.minorcase', compact('points'));
    }

    public function add()
    {
        $users = Users::where('usr_is_use', 1)
            ->where('usr_role', 'Developer')
            ->select('usr_id as id', 'usr_name as name')
            ->get();

        $teams = Team::where('tm_is_use', 1)
            ->select('tm_id as id', 'tm_name as name')
            ->get();

        $years = Sprint::select('spr_year as year')->distinct()->get();
        $sprints = Sprint::select('spr_number as number')->distinct()->get();

        return view('pages.minorCase.addminorcase', compact('users', 'teams', 'years', 'sprints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pcs_pass' => 'required|numeric|min:0',
            'pcs_spr_id' => 'required|exists:sprints,spr_id',
            'pcs_uth_id' => 'required|exists:user_team_history,uth_id',
            'mnc_card_detail' => 'nullable|string',
            'mnc_defect_detail' => 'nullable|string',
        ]);

        // 1. สร้าง Minor Case
        $minorCase = MinorCase::create([
            'mnc_card_detail' => $request->mnc_card_detail,
            'mnc_defect_detail' => $request->mnc_defect_detail,
            'mnc_point' => $request->pcs_pass,
            'mnc_is_use' => 1,
        ]);

        // 2. สร้าง PointCurrentSpri nt
        PointCurrentSprint::create([
            'pcs_spr_id' => $request->pcs_spr_id,
            'pcs_uth_id' => $request->pcs_uth_id,
            'pcs_mnc_id' => $minorCase->mnc_id,
            'pcs_pass' => $request->pcs_pass,
            'pcs_is_use' => 1,
        ]);

        return redirect()->route('minorcase')->with('success', 'Minorcase added successfully.');
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