<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Team;
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

    //Create Trello API
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

    //Edit Trello API
    public function editAPI($id) {
        $api = TrelloCredential::findOrFail($id);
        return view('pages.trello.editApi', compact('api'));
    }

    //Update Trello API
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

        return redirect()->route('trello.config')->with('success', 'Trello API updated successfully!');
    }


    //Delete Trello API
    public function deleteAPI($id) {
        // ค้นหา TrelloCredential ที่ต้องการลบ
        $trello = TrelloCredential::findOrFail($id);

        // ลบข้อมูลในตาราง Card ที่อ้างอิงถึง trc_id (foreign key)
        $cards = Card::where('crd_trc_id', $trello->trc_id)->get();

        foreach ($cards as $card) {
            $card->delete();  // ลบการ์ดที่อ้างอิงถึง trc_id
        }

        // อัพเดต tm_trc_id ในตาราง Team ให้เป็น null (ไม่ลบ เพราะต้องเก็บประวัติ)
        Team::where('tm_trc_id', $trello->trc_id)
            ->update(['tm_trc_id' => null]);  // เปลี่ยนเป็น null เพื่อเก็บประวัติ

        // ลบ TrelloCredential (trc_id) หลังจากลบข้อมูลที่เกี่ยวข้องแล้ว
        $trello->delete();

        // ส่งกลับไปยังหน้าที่ต้องการพร้อมข้อความยืนยัน
        return redirect()->route('trello.config')->with('success', 'Trello API deleted successfully!');
    }

// ****************************************************************************************************** //

    //Trello List
    public function list(){
        return view('pages.trello.list');
    }

    //Create Trello List
    public function createList(Request $request){
        $validator = Validator::make($request->all(), [
            'setting_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $setting = new SettingTrello();
        $setting->stl_name = $request->setting_name;
        $setting->stl_todo = $request->stl_todo ?? 'To-do';
        $setting->stl_inprogress = $request->stl_inprogress ?? 'In-progress';
        $setting->stl_done = $request->stl_done ?? 'Done';
        $setting->stl_bug = $request->stl_bug ?? 'Bug';
        $setting->stl_minor_case = $request->stl_minor_case ?? 'Minor case';
        $setting->stl_extra = $request->stl_extra ?? 'Extra';
        $setting->stl_cancel = $request->stl_cancel ?? 'Cancel';
        $setting->save();

        return redirect()->route('trello.config')->with('success', 'Trello List Setting created successfully!');
    }

    //Edit TrellO List
    public function editList($id){
        $setting = SettingTrello::findOrFail($id);
        return view('pages.trello.editList', compact('setting'));
    }

    // Update Trello List
    public function updateList(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'setting_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $setting = SettingTrello::findOrFail($id);
        // ถ้าไม่ได้กรอกให้ใช้ของเดิม
        $setting->stl_name = $request->filled('setting_name') ? $request->setting_name : $setting->stl_name;
        $setting->stl_todo = $request->filled('stl_todo') ? $request->stl_todo : $setting->stl_todo;
        $setting->stl_inprogress = $request->filled('stl_inprogress') ? $request->stl_inprogress : $setting->stl_inprogress;
        $setting->stl_done = $request->filled('stl_done') ? $request->stl_done : $setting->stl_done;
        $setting->stl_bug = $request->filled('stl_bug') ? $request->stl_bug : $setting->stl_bug;
        $setting->stl_minor_case = $request->filled('stl_minor_case') ? $request->stl_minor_case : $setting->stl_minor_case;
        $setting->stl_extra = $request->filled('stl_extra') ? $request->stl_extra : $setting->stl_extra;
        $setting->stl_cancel = $request->filled('stl_cancel') ? $request->stl_cancel : $setting->stl_cancel;
        $setting->save();

        return redirect()->route('trello.config')->with('success', 'Trello List Setting updated successfully!');
    }

    //Delete Trello List
    public function deleteList($id) {
    try {
        // Check if the list can be deleted (add your conditions here)
        $canDelete = true; // Replace with your actual condition

        if (!$canDelete) {
            return redirect()->route('trello.config')->with('warning', 'Cannot delete this list because it is in use.');
            }

            // ค้นหา SettingTrello ที่ต้องการลบ
            $trello = SettingTrello::findOrFail($id);
            $trello->delete();

            // ส่งกลับไปยังหน้าที่ต้องการพร้อมข้อความยืนยัน
            return redirect()->route('trello.config')->with('success', 'Trello List deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('trello.config')->with('warning', 'Cannot delete this list: ');
        }
    }
}