<?php

namespace App\Http\Controllers;
use App\Models\TrelloCredential;
use App\Models\SettingTrello;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TrelloConfigurationController extends Controller
{
    public function index(){

        $apis = TrelloCredential::all();
        $lists = SettingTrello::all();

        return view('pages.trello.config', compact('apis', 'lists'));
    }

    //Trello API
    public function api(){
        return view('pages.trello.api');
    }

    //Create API
    public function createAPI(Request $request){
    $validator = Validator::make($request->all(), [
        'setting_name' => 'required',
        'api_key' => 'required',
        'api_token' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $trello = new TrelloCredential();
    $trello->trc_name = $request->setting_name;
    $trello->trc_api_key = $request->api_key;
    $trello->trc_api_token = $request->api_token;
    $trello->save();

    return redirect()->route('trello.config')->with('success', 'Trello credentials saved successfully!');
    }

    //Edit API
    public function editAPI($id) {
        $trello = TrelloCredential::findOrFail($id);
        return view('trello.edit', compact('trello'));
    }

    //Update API
    public function updateAPI(Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'setting_name' => 'required',
        'api_key' => 'required',
        'api_token' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $trello = TrelloCredential::findOrFail($id);
    $trello->trc_name = $request->setting_name;
    $trello->trc_api_key = $request->api_key;
    $trello->trc_api_token = $request->api_token;
    $trello->save();

    return redirect()->route('trello.config')->with('success', 'Trello credentials updated successfully!');
    }

    public function deleteAPI($id) {
        $trello = TrelloCredential::findOrFail($id);
        $trello->delete();

        return redirect()->route('trello.config')->with('success', 'Trello API deleted successfully!');
    }

    //Trello List
    public function list(){
        return view('pages.trello.list');
    }

    //Create List
    public function createList(Request $request){
    // ตรวจสอบข้อมูลที่ต้องการ
    $request->validate([
        'stl_name' => 'required',
        'stl_todo' => 'required',
        'stl_inprogress' => 'required',
        'stl_done' => 'required',
        'stl_bug' => 'required',
        'stl_minor_case' => 'required',
        'stl_cancel' => 'required',
    ]);

    // บันทึกข้อมูลที่ได้จาก session
    $settingTrello = new SettingTrello();
    $settingTrello->stl_name = $request->input('stl_name');
    $settingTrello->stl_todo = session('stl_todo');
    $settingTrello->stl_inprogress = session('stl_inprogress');
    $settingTrello->stl_done = session('stl_done');
    $settingTrello->stl_bug = session('stl_bug');
    $settingTrello->stl_cancel = session('stl_cancel');
    $settingTrello->stl_minor_case = session('stl_minor_case');
    $settingTrello->save();

    // ล้างข้อมูลจาก session หลังจากบันทึก
    session()->forget(['stl_todo', 'stl_inprogress', 'stl_done', 'stl_bug', 'stl_minor_case', 'stl_cancel']);

    return redirect()->route('trelloConfigurationList')->with('success', 'Trello List created successfully!');
    }

    public function deleteList($id) {
        $trello = SettingTrello::findOrFail($id);
        $trello->delete();

        return redirect()->route('trello.config')->with('success', 'Trello API deleted successfully!');
    }
}
