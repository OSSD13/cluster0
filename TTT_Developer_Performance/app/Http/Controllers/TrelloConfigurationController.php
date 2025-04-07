<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrelloConfigurationController extends Controller
{
    public function index(){
        $apis = collect([
            (object)['id' => 1, 'name' => 'API Set 1'],
            (object)['id' => 2, 'name' => 'API Set 2'],
        ]);

        $lists = collect([
            (object)['id' => 1, 'name' => 'List Set 1'],
            (object)['id' => 2, 'name' => 'List Set 2'],
            (object)['id' => 5, 'name' => 'List Set 2'],
        ]);

        return view('pages.trelloConfiguration', compact('apis', 'lists'));
    }
}
