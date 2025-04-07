<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisionHistoryController extends Controller
{
    public function index(Request $request)
    {
        $revisionHistories = [
            [
                'editor' => 'You edited',
                'sprint' => '67-50',
                'version' => 1,
                'updated_at' => '30/08/2024 17:55',
            ],
            [
                'editor' => 'Sumo',
                'sprint' => '67-50',
                'version' => 2,
                'updated_at' => '15/10/2024 12:55',
            ],
            [
                'editor' => 'Hade',
                'sprint' => '67-50',
                'version' => 3,
                'updated_at' => '03/12/2024 09:55',
            ],
            [
                'editor' => 'Zoom',
                'sprint' => '67-50',
                'version' => 3,
                'updated_at' => '03/12/2024 09:55',
            ],
        ];

        return view('pages.setting.revisionHistory', compact('revisionHistories'));
    }
}
