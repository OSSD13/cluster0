<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\ExtraPoint;
use App\Models\UserTeamHistory;

class ExtrapointController extends Controller
{
    //
    function index()
    {

        $extraPoints = DB::table('extra_points')
            ->leftJoin('sprints', 'extra_points.ext_spr_id', '=', 'sprints.spr_id')
            ->leftJoin('user_team_history', 'extra_points.ext_uth_id', '=', 'user_team_history.uth_id')
            ->leftJoin('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->leftJoin('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->select(
                'extra_points.ext_id',
                'extra_points.ext_value',
                'sprints.spr_year',
                'sprints.spr_number',
                'users.usr_username',
                'teams.tm_name',
            )
            ->where('ext_is_use', '=', 1)
            ->get();
        return view('pages.extraPoint.list', compact('extraPoints'));
    }
    //
    function add()
    {
        $users = DB::table('users')
            ->where([
                ['usr_is_use', '=', 1],
                ['usr_role', '=', 'Developer'],
            ])
            ->select('usr_id as id', 'usr_name as name')
            ->get();
        $teams = DB::table('teams')
            ->where('tm_is_use', '=', 1)
            ->select('tm_id as id', 'tm_name as teamName')
            ->get();
        $years = DB::table('sprints')
            ->select('spr_year as year')
            ->distinct('spr_year')
            ->get();
        $sprints = DB::table('sprints')
            ->select('spr_number as number')
            ->distinct('spr_number')
            ->get();

        return view('pages.extraPoint.add', compact('users', 'teams', 'sprints', 'years'));
    }
    function edit($id)
    {
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
        return view('pages.extraPoint.edit', compact('users', 'teams', 'id', 'sprints', 'years'));
    }
    //
    function update(Request $request) {}
    function store(Request $request)
    {
        try {
            $extraPoint = new ExtraPoint();
            $validated = $request->validate([
                'member' => 'required|string',
                'current_team' => 'required|string',
                'point_all' => 'required|numeric',
                'spr_number' => 'required|integer',
                'spr_year' => 'required|integer',
            ]);
            $extraPoint->ext_value = $validated['point_all'];
            $extraPoint->ext_uth_id = $this->findUTHID($validated['member'], $validated['current_team']);
            $extraPoint->ext_spr_id = $this->findSprintID($validated['spr_year'], $validated['spr_number']);
            $extraPoint->save();
            return redirect()->route('extraPoint')->with('success', 'Extrapoint created successfully!');
        } catch (Exception $e) {
            // แสดงข้อผิดพลาดในหน้าเว็บ
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);
        }
    }
    function delete($id)
    {
        //find the extrapoint by ID and delete it
        $extraPoint = ExtraPoint::find($id);
        //change pts_is_use to 0
        $extraPoint->ext_is_use = 0;
        $extraPoint->save();
        return redirect()->route('extraPoint')->with('success', 'Extrapoint deleted successfully.');
    }
    //
    function getSprint($id)
    {
        $sprints = DB::table('sprints')
            ->where('spr_year', '=', $id)
            ->select('spr_number as number')
            ->distinct('spr_number')
            ->get();
        return response()->json($sprints);
    }
    //

    function findSprintID($year, $number)
    {
        //find sprint id by year and number
        $sprint = DB::table('sprints')
            ->select('spr_id')
            ->where([
                ['spr_year', '=', $year],
                ['spr_number', '=', $number]
            ])
            ->first();
        //dd($sprint->spr_id);
        return $sprint->spr_id;
    }

    function findUTHID($memberID, $teamID)
    {
        $userTeamHistory1 = DB::table('user_team_history')
            ->select('uth_id', 'uth_usr_id')
            ->where([
                ['uth_usr_id', '=', $memberID],
                ['uth_tm_id', '=', $teamID]
            ])
            ->first();
        if ($userTeamHistory1 != null) {
            return $userTeamHistory1->uth_id;
        } else {
            $userTeamHistory2 = UserTeamHistory::where([
                ['uth_usr_id', '=', $memberID],
                ['uth_is_use', 1]
            ])
            ->first();
            $userTeamHistory2->uth_tm_id = $teamID;
            $userTeamHistory2->save();
            return $userTeamHistory2->uth_id;
        }
    }
}
