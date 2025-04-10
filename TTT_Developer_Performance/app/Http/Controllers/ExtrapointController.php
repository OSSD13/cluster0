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
    function test()
    {
        return view('pages.Extrapoint.edit');
    }
    function index(Request $request)
    {
        $query = DB::table('extra_points')
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
                'teams.tm_name'
            )
            ->where('extra_points.ext_is_use', '=', 1);

        // Apply filters
        if ($request->has('years') && !empty($request->years)) {
            $years = explode(',', $request->years);
            $query->whereIn('sprints.spr_year', $years);
        }

        if ($request->has('sprints') && !empty($request->sprints)) {
            $sprints = explode(',', $request->sprints);
            $query->whereIn('sprints.spr_number', $sprints);
        }

        if ($request->has('teams') && !empty($request->teams)) {
            $teams = explode(',', $request->teams);
            $query->whereIn('teams.tm_name', $teams);
        }

        if ($request->has('members') && !empty($request->members)) {
            $members = explode(',', $request->members);
            $query->whereIn('users.usr_username', $members);
        }

        // Execute query
        $extraPoints = $query->get();

        // Prepare data for filter dropdowns
        // Prepare data for filter dropdowns
        $members = DB::table('users')
            ->where('usr_role', 'developer')
            ->where('usr_is_use', '=', 1)
            ->pluck('usr_username');

        $years = $extraPoints->pluck('spr_year')->unique()->sortDesc();
        $sprints = $extraPoints->pluck('spr_number')->unique()->sort();
        $teams = $extraPoints->pluck('tm_name')->filter()->unique()->values();

        return view('pages.extraPoint.list', compact('extraPoints', 'years', 'sprints', 'teams', 'members'));
    }

    //
    public function add()
    {
        $teams = DB::table('teams')->get();
        $sprints = DB::table('sprints')->get();

        return view('pages.extraPoint.add', compact('teams', 'sprints'));
    }

    public function edit(Request $request)
    {
        // รับค่าจากฟอร์ม
        $editID = $request->editID;

        // ดึงข้อมูลผู้ใช้ที่เป็น Developer และใช้งานอยู่
        $users = DB::table('users')
            ->where('usr_is_use', '=', 1)
            ->where('usr_role', '=', 'Developer')
            ->select('usr_id as id', 'usr_username as name')
            ->get();

        // ดึงข้อมูลทีมที่ใช้งานอยู่
        $teams = DB::table('teams')
            ->where('tm_is_use', '=', 1)
            ->select('tm_id as id', 'tm_name as teamName')
            ->get();

        // ดึงปีที่ไม่ซ้ำจากตาราง sprints
        $years = DB::table('sprints')
            ->select('spr_year as year')
            ->distinct()
            ->get();

        // ดึงหมายเลขสปรินต์ที่ไม่ซ้ำจากตาราง sprints
        $sprints = DB::table('sprints')
            ->select('spr_number as number')
            ->distinct()
            ->get();

        // ส่งข้อมูลไปยัง view
        // เปลี่ยนเส้นทางไปที่หน้า edit โดยใช้ GET
        return redirect()->route('editExtraPoint', ['editID' => $editID])
            ->with(compact('users', 'teams', 'sprints', 'years', 'editID'));
    }

    //
    public function update(Request $request)
    {
        try {
            $extraPoint = ExtraPoint::findOrFail($request['editID']);

            $validated = $request->validate([
                'tm_id' => 'required|numeric',
                'usr_id' => 'required|numeric',
                'spr_year' => 'required|integer',
                'spr_number' => 'required|integer',
                'ext_value' => 'required|numeric'
            ]);

            $extraPoint->ext_value = $validated['ext_value'];
            $extraPoint->ext_uth_id = $this->findUTHID($validated['usr_id'], $validated['tm_id']);
            $extraPoint->ext_spr_id = $this->findSprintID($validated['spr_year'], $validated['spr_number']);
            $extraPoint->save();

            return redirect()->route('extraPoint')->with('success', 'Extrapoint updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update extrapoint: ' . $e->getMessage()]);
        }
    }


    function store(Request $request)
    {
        try {
            $extraPoint = new ExtraPoint();
            $validated = $request->validate([
                'tm_id' => 'required|string',
                'usr_id' => 'required|numeric',
                'spr_year' => 'required|integer',
                'spr_number' => 'required|integer',
                'ext_value' => 'required'
            ]);
            $extraPoint->ext_value = $validated['ext_value'];
            $extraPoint->ext_uth_id = $this->findUTHID($validated['usr_id'], $validated['tm_id']);
            $extraPoint->ext_spr_id = $this->findSprintID($validated['spr_year'], $validated['spr_number']);
            $extraPoint->save();
            return redirect()->route('extraPoint')->with('success', 'Extrapoint created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);
        }
    }
    function delete($id)
    {
        $extraPoint = ExtraPoint::find($id);
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
        if (!$sprint) {
            return redirect()->back()->withErrors('ไม่พบข้อมูล Sprint');
        }
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
    public function getMembersByTeam($teamId)
    {

        $members = DB::select('
            SELECT u.usr_id, u.usr_username
            FROM user_team_history uth
            JOIN users u ON uth.uth_usr_id = u.usr_id
            WHERE uth.uth_tm_id = ? AND uth.uth_is_current = 1
        ', [$teamId]);

        return response()->json($members);
    }
    public function getSprintsByYear($year)
    {
        $sprints = DB::table('sprints')
            ->select('spr_id', 'spr_number')
            ->where('spr_year', $year)
            ->get();

        return response()->json($sprints);
    }
}
