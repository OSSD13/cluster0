<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as Pdf;

class ReportController extends Controller
{
    public function index(){
        return view('pages.report');
    }

    public function reportGenerate(){
        // $pdf = Pdf::loadView('layouts.pdf');
        // return $pdf->download('report.pdf');
        return view('layouts.pdf');
    }
}
