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
            ->where('points.pts_type', 'extra')
            ->get();
        return view('pages.extrapoint.list', compact('points'));
    }
    function add()
    {
        return view('pages.extrapoint.add');
    }
    function edit()
    {
        return view('pages.extrapoint.edit');
    }
    function update()
    {
        try {
            // Validate the request data
            $validatedData = request()->validate([
                'id' => 'required|integer',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

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
            DB::table('points')->insert([
                'pts_created_time' => now(),
                'pts_uth_id' => $validated['current_team'],
                'pts_updated_time' => now(),
                'pts_value' => $validated['point_all'],
                'pts_is_use' => 1,
                'pts_version_id' => 1,
                'pts_spr_id' => 1
            ]);
            return redirect()->route('extrapoint')->with('success', 'Extrapoint created successfully!');
        } catch (Exception $e) {
            // แสดงข้อผิดพลาดในหน้าเว็บ
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);
        }
    }
    function delete()
    {
        return view('pages.extrapoint.delete');
    }
    //
}
