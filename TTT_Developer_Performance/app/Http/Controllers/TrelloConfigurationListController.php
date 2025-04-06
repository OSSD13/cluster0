<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrelloConfigurationListController extends Controller
{
    //
    public function index(){
        return view('pages.trelloConfigurationList');
    }
}
