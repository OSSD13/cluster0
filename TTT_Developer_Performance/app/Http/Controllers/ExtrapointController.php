<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ExtrapointController extends Controller
{
    function index()
    {
        return view('pages.extrapoint.list');
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
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create extrapoint: ' . $e->getMessage()]);}
    }
    function delete()
    {
        return view('pages.extrapoint.delete');
    }
    //
}
