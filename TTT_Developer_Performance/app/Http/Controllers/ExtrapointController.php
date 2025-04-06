<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Point;

class ExtrapointController extends Controller
{
    function index()
    {
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
            ])
            ->get();
        return view('pages.extrapoint.list', compact('points'));
    }
    function add()
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

        return view('pages.extrapoint.add', compact('users', 'teams'));
    }
    function edit(Request $request, $id)
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

        return view('pages.extrapoint.edit', compact('users', 'teams', 'id'));
    }
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


                return redirect()->route('extrapoint.index')->with('success', 'Extrapoint updated successfully.');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Failed to update extrapoint: ' . $e->getMessage());
            }
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member' => 'required|string',
            'current_team' => 'required|string',
            'point_all' => 'required|numeric',
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
}
