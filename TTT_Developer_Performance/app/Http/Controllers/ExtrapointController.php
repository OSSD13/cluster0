<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use App\Models\UserTeamHistory; // Add this line to import the UserTeamHistory model
use App\Models\Version; // Add this line to import the Version model

class ExtrapointController extends Controller
{
    public function index()
//
    function index()
    {
        $lastVersion = Version::select('ver_id')
            ->orderBy('ver_version')
            ->first();
        $points = DB::table('points')
            ->join('user_team_history', 'points.pts_uth_id', '=', 'user_team_history.uth_id')
            ->join('teams', 'user_team_history.uth_tm_id', '=', 'tm_id')
            ->join('users', 'user_team_history.uth_usr_id', '=', 'usr_id')
            ->join('sprints', 'points.pts_spr_id', '=', 'spr_id')
            ->select(
                'points.pts_value as value',
                'points.pts_id as id',
                'users.usr_name as member',
                'teams.tm_name as team',
                'sprints.spr_year as sprint_year',
                'sprints.spr_number as sprint_num',
            )
            ->where([
                ['points.pts_type', '=', 'extra'],
                ['points.pts_is_use', '=', 1]
                ['points.pts_is_use', '=', 1],
                ['points.pts_ver_id', '=',$lastVersion->ver_id]
            ])
            ->get();
        return view('pages.extraPoint.list', compact('points'));
    }

    public function add()
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

        return view('pages.extraPoint.list', compact('users', 'teams'));
    }

    public function edit(Request $request, $id)
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

        return view('pages.extraPoint.edit', compact('users', 'teams', 'id'));
        $years = DB::table('sprints')
            ->select('spr_year as year')
            ->distinct('spr_year')
            ->get();
        $sprints = DB::table('sprints')
            ->select('spr_number as number')
            ->distinct('spr_number')
            ->get();
        return view('pages.extrapoint.edit', compact('users', 'teams', 'id', 'sprints', 'years'));
>>>>>>> feature-66160100
    }
    //
    function update(Request $request)
        {
            try {
                // Validate the request data
                $validatedData = request()->validate([
                    'id' => 'required|integer',
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                ]);
                // Find the extrapoint by ID
                $extrapoint = Point::findOrFail($validatedData['id']);

                // Find the extrapoint by ID and update it

                // Update other fields as needed

    {
        try {
            // Validate the request data
            $validatedData = request()->validate([
                'member' => 'required|integer',
                'current_team' => 'required|integer',
                'point_all' => 'required|numeric',
                'spr_number' => 'required|integer',
                'spr_year' => 'required|integer',
            ]);
            // Find the extrapoint by ID
            $oldExtrapoint = Point::find(request('id'));

                return redirect()->route('extrapoint.index')->with('success', 'Extrapoint updated successfully.');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Failed to update extrapoint: ' . $e->getMessage());
            //create new extrapoint
            $newExtrapoint = new Point();
            $newExtrapoint->pts_category = $oldExtrapoint->pts_category;
            $newExtrapoint->pts_created_time = now();
            $newExtrapoint->pts_type = 'extra';
            $newExtrapoint->pts_updated_time = now();
            $newSprintID = $this->findSprintID($validatedData['spr_year'], $validatedData['spr_number']);
            $newExtrapoint->pts_spr_id = $newSprintID;
            $newExtrapoint->pts_uth_id = $this->findUTHID($validatedData['member'], $validatedData['current_team']);
            $newExtrapoint->pts_value = $validatedData['point_all'];
            $newVersionID = $this->findVersionID($validatedData['spr_year'], $validatedData['spr_number']);
            $newExtrapoint->pts_ver_id = $newVersionID;
            //save new extrapoint
            $newExtrapoint->save();
            // create other point in old version for newVersion
            $oldPoint = DB::table('points')
                ->select('*')
                ->where([
                    ['pts_spr_id', '=', $oldExtrapoint->pts_spr_id],
                    ['pts_ver_id', '=', $newVersionID],
                    ['pts_is_use', '=', 1]
                ])
                ->get();
            foreach ($oldPoint as $point) {
                $newPoint = new Point();
                $newPoint->pts_category = 'pass';
                $newPoint->pts_spr_id = $point->pts_spr_id;
                $newPoint->pts_type = $point->pts_type;
                $newPoint->pts_uth_id = $point->pts_uth_id;
                $newPoint->pts_value = $point->pts_value;
                $newPoint->pts_ver_id = $newVersionID;
                $newPoint->save();
            }

            return redirect()->route('extrapoint')->with('success', 'Extrapoint updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);
        }
    }
    public function store(Request $request)
    function store(Request $request)
    {
        $validated = $request->validate([
            'member' => 'required|string',
            'current_team' => 'required|string',
            'point_all' => 'required|numeric',
            'spr_number' => 'required|integer',
            'spr_year' => 'required|integer',
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
            $point->pts_category = 'pass';
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
            $point->pts_uth_id = $this->findUTHID($validated['member'], $validated['current_team']);
            $point->pts_spr_id = $this->findSprintID($validated['spr_year'],$validated['spr_number']);
            $point->pts_ver_id = $this->findVersionID($validated['spr_year'], $validated['spr_number']);
            $point->pts_value = $validated['point_all'];
            $point->pts_is_use = 1;
            $point->pts_version_id = DB::table('versions')->latest('ver_id')->value('ver_id');
            $point->pts_spr_id = DB::table('sprints')->latest('spr_id')->value('spr_id');
            $point->save();
            return redirect()->route('extrapoint')->with('success', 'Extrapoint created successfully!');
        } catch (Exception $e) {
            // แสดงข้อผิดพลาดในหน้าเว็บ
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);
        }
    }
    function delete($id)
    {
        //find the extrapoint by ID and delete it
        $point = Point::find($id);
        //change pts_is_use to 0
        $point->pts_is_use = 0;
        $point->save();
        return redirect()->route('extrapoint')->with('success', 'Extrapoint deleted successfully.');
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
    function findUTHID($userID, $teamID)
    {
        //find uth_id by member and current_team
        $user_team_history = DB::table('user_team_history')
            ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
            ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id')
            ->select('user_team_history.uth_id', 'user_team_history.uth_tm_id', 'users.usr_id', 'teams.tm_id')
            ->where([
                ['users.usr_id', '=', request('member')],
                ['user_team_history.uth_is_current', '=', 1]
            ])
            ->first();
        if ($user_team_history != null && $user_team_history->uth_tm_id == $teamID) {
            // Set the uth_id if found
            return $user_team_history->uth_id;
        } else if ($user_team_history != null && $user_team_history->uth_tm_id != $teamID) {
            //Set uth_end_date to now
            DB::table('user_team_history')
                ->where('uth_usr_id', '=', $userID)
                ->orderBy('uth_id', 'desc')
                ->limit(1)
                ->update([
                    'uth_end_date' => now(),
                    'uth_is_current' => 0
                ]);
            //create new user_team_history
            $uth = new UserTeamHistory();
            $uth->uth_usr_id = $userID;
            $uth->uth_tm_id = $teamID;
            $uth->save();
            return $uth->uth_id;
        } else {
            //create new user_team_history
            $uth = DB::table('user_team_history')->insertGetId([
                'uth_usr_id' => DB::table('users')->where('usr_id', $userID['member'])->value('usr_id'),
                'uth_tm_id' => DB::table('teams')->where('tm_id', $userID['current_team'])->value('tm_id'),
                'uth_start_date' => now()
            ]);
            return $uth;
        }
    }
    //
    function findVersionID($spr_year, $spr_number)
    {
        //find sprint id
        $sprint = DB::table('sprints')
            ->select('spr_id')
            ->where('spr_year', '=', $spr_year)
            ->where('spr_number', '=', $spr_number)
            ->first();
        //find the latest version by spr_id
        $latestVersion = DB::table('versions')
            ->where('ver_spr_id', '=', $sprint->spr_id)
            ->select('ver_id')
            ->orderBy('ver_version', 'desc')
            ->first();
        if ($latestVersion != null) {
            return $latestVersion->ver_id;
        } else {
            //create new version
            $newVersion = DB::table('versions')->insertGetId([
                'ver_created_time' => now(),
                //'ver_editor_id' => auth()->user()->usr_id, // Not yet implemented
                'ver_editor_id' => 1,
                'ver_spr_id' => $sprint->id,
                'ver_version' => 1
            ]);
            return $newVersion;
        }
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
}
