<?php

namespace App\Http\Controllers;
use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(){
        $sprints = Sprint::paginate('10');
        return view('pages.sprint.sprintList',compact('sprints'));
    }

    public function add(){
        return view('pages.sprint.createSprint');
    }
    public function store(Request $req){
        $req->validate([
            'year' => 'required',
            'sprint' => 'required'
        ]);
        $sprint = new Sprint();
        $sprint->spr_year = $req->year;
        $sprint->spr_number = $req->sprint;
        $sprint->spr_date_start = null;
        $sprint->spr_date_finish = null;
        $sprint->save();
        return redirect()->route('sprint');
    }

    public function edit($id){
        $sprint = Sprint::find($id);
        return view('pages.sprint.editSprint', compact('sprint'));
    }

    public function update(Request $req, $id){
        $req->validate([
            'year' => 'required', // เป็นตัว name ของ input ที่รับเข้ามา
            'sprint' => 'required'
        ]);

        $sprint = Sprint::find($id);
        $sprint->spr_year = $req->year;
        $sprint->spr_number = $req->sprint;
        $sprint->spr_date_start = null;
        $sprint->spr_date_finish = null;
        $sprint->save();
        return redirect()->route('sprint');
    }

    function delete($id){
        $sprint = Sprint::find($id);
        $sprint->delete();
        return redirect()->route('sprint');
    }
}
