<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;


class TeamPerformanceController extends Controller
{
    public function TeamPerformance(){
        return view('pages.dashboard.teamPerformance');
    }

    public function testTrelloApi(){
        // API key และ token ของ Trello
        $key = 'b683c2629414230b29ab2bfc3ac2ddb1';
        $token = 'ATTAd32cb8066cf7993bbd622dab6f0f6475110b47b32767ad3b8f690474537efbcb913D3106';

        // ดึงข้อมูลการ์ดที่กรองจาก Trello
        $cardsWithDetails = $this->getFilteredCardsWithDetails($key, $token);

        // ส่งข้อมูลไปยัง view
        return view('fetchcards', compact('cardsWithDetails'));
    }

    public function getFilteredCardsWithDetails($key, $token){
        // 1. ดึง board ทั้งหมดจาก Trello
        $url = "https://api.trello.com/1/members/me/boards";
        $response = Http::get($url, [
            'key' => $key,
            'token' => $token,
        ]);

        if (!$response->successful()) {
            return response()->json(['error' => 'ไม่สามารถดึงข้อมูลบอร์ดจาก Trello ได้'], $response->status());
        }

        $allBoards = $response->json();

        // 2. ดึงชื่อบอร์ดที่ตรงกับใน DB
        //$teamBoardNames = Team::pluck('trello_board_name')->toArray();
        $teamBoardNames = ['TTT Developer Performance (TestAPI)'];

        // 3. กรองเฉพาะบอร์ดที่ตรงกับชื่อใน DB
        $matchedBoards = collect($allBoards)->filter(function ($board) use ($teamBoardNames) {
            return in_array($board['name'], $teamBoardNames);
        });

        // 4. วนลูปดึง cards จากแต่ละ board
        $cardsWithDetails = [];

        foreach ($matchedBoards as $board) {
            $cardsResponse = Http::get("https://api.trello.com/1/boards/{$board['id']}/cards", [
                'key' => $key,
                'token' => $token,
                'members' => 'true',
                'pluginData' => 'true',
            ]);

            if (!$cardsResponse->successful()) {
                continue;
            }

            $cards = $cardsResponse->json();

            foreach ($cards as $card) {
                // ดึงชื่อ list
                $listResponse = Http::get("https://api.trello.com/1/lists/{$card['idList']}", [
                    'key' => $key,
                    'token' => $token,
                ]);

                $listName = $listResponse->successful() ? $listResponse->json()['name'] : null;

                // ดึง pluginData ที่ match กับ ID
                $valueFromPlugin = null;
                if (!empty($card['pluginData'])) {
                    foreach ($card['pluginData'] as $plugin) {
                        if ($plugin['idPlugin'] === '59d4ef8cfea15a55b0086614') {
                            $valueFromPlugin = json_decode($plugin['value'], true);
                        }
                    }
                }

                // ดึงข้อมูลสมาชิก (full name) จาก idMembers
                $memberFullNames = [];
                foreach ($card['idMembers'] as $memberId) {
                    $memberResponse = Http::get("https://api.trello.com/1/members/{$memberId}", [
                        'key' => $key,
                        'token' => $token,
                    ]);
                    if ($memberResponse->successful()) {
                        $memberData = $memberResponse->json();
                        $memberFullNames[] = $memberData['fullName'];
                    }
                }

                // เก็บข้อมูลการ์ดทั้งหมดพร้อมชื่อสมาชิกเต็ม
                $cardsWithDetails[] = [
                    'board_name' => $board['name'],
                    'list_name' => $listName,
                    'card_title' => $card['name'],
                    'card_description' => $card['desc'],
                    'members' => $memberFullNames, // แสดงชื่อเต็มของสมาชิกแทน idMembers
                    'plugin_value' => $valueFromPlugin,
                ];
            }
        }

        return $cardsWithDetails;
    }

    public function saveCards(Request $request)
    {
        // รับข้อมูลจาก request
        $cardsData = $request->input('cards'); // cardsData ควรจะเป็น array ของข้อมูลที่ดึงมา

        foreach ($cardsData as $card) {
            // บันทึกข้อมูลลงในฐานข้อมูล
            Card::create([
                'crd_trc_id' => 1,  // ใช้ค่าคงที่ 1
                'crd_trello_id' => 1,  // ใช้ค่าคงที่ 1
                'crd_boardname' => $card['board_name'],
                'crd_listname' => $card['list_name'],
                'crd_title' => $card['card_title'],
                'crd_detail' => $card['card_description'],
                'crd_member_fullname' => implode(', ', $card['members']),  // รวมชื่อสมาชิกทั้งหมด
                'crd_point' => isset($card['plugin_value']) ? $card['plugin_value'] : null,  // สมมติว่า plugin_value คือคะแนน
            ]);
        }

        // หลังจากบันทึกข้อมูลแล้ว
        return redirect()->route('teamPerformance')->with('success', 'ข้อมูลการ์ดได้รับการบันทึกเรียบร้อยแล้ว!');
    }

    public function card(){
        $cards = Card::All();
        return view('pages.dashboard.teamPerformance',compact('cards'));
    }

    // public function insertCard(){
    //     Card::create([
    //         'crd_trc_id' => 1,
    //         'crd_boardname' => 'Board1',
    //         'crd_listname' => 'List1',
    //         'crd_title' => 'Task Title',
    //         'crd_detail' => 'Detail of task',
    //         'crd_member_fullname' => 'nah',
    //         'crd_point' => 10
    //     ]);
    //     return redirect('pages.teamPerformance');
    // // return redirect('/card');
    // }
}
