<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrelloConfigurationController extends Controller
{
    public function index()
    {

        //$apiSets = TrelloApi::all();
        //$listSets = TrelloList::all();

        return view('pages.trelloConfiguration');
    }
}
