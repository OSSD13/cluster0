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

        return view('pages.trello.trelloConfiguration', compact('apis', 'lists'));
    }

    //Trello API
    public function api(){
        return view('pages.trello.trelloConfigurationAPI');
    }

    //Function Create API
    public function CreateAPI(Request $request){
    $validator = Validator::make($request->all(), [
        'setting_name' => 'required',
        'api_key' => 'required',
        'api_token' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $trello = new TrelloCredential();
    $trello->trc_id = 3;
    $trello->trc_name = $request->setting_name;
    $trello->trc_api_key = $request->api_key;
    $trello->trc_api_token = $request->api_token;
    $trello->save();

    return redirect()->route('trelloConfiguration')->with('success', 'Trello credentials saved successfully!');
    }

    /*public function deleteAPI($id){
    $api = TrelloCredential::findOrFail($id);
    $api->delete();

    return redirect()->route('trelloConfiguration')->with('success', 'Deleted successfully!');
    }*/


    public function list(){
        return view('pages.trello.trelloConfigurationList');
    }

    public function CreateList(Request $request)
    {
        $request->validate([
            'stl_bug' => 'required',
            'stl_cancel' => 'required',
            'stl_done' => 'required',
            'stl_inprogress' => 'required',
            'stl_minor_case' => 'required',
            'stl_name' => 'required',
            'stl_todo' => 'required',
            'stl_id' => 'required',
        ]);

        SettingTrello::create([
            'stl_name' => $request->input('stl_name'),
            'stl_todo' => $request->input('stl_todo'),
            'stl_inprogress' => $request->input('stl_inprogress'),
            'stl_done' => $request->input('stl_done'),
            'stl_bug' => $request->input('stl_bug'),
            'stl_cancel' => $request->input('stl_cancel'),
            'stl_minor_case' => $request->input('stl_minor_case'),
            'stl_trc_id' => $request->input('stl_trc_id'),
        ]);

        return redirect()->route('trelloConfigurationList')->with('success', 'List created successfully!');
    }
}
