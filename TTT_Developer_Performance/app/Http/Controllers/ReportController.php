<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Mail\ReportEmail;
use Pdf;

class ReportController extends Controller
{
    public function index(){
        return view('pages.report.report');
    }

    public function reportGenerate(){
        $pdf = Pdf::loadView('layouts.pdf');
        // return $pdf->download('report.pdf');
        return $pdf->download('layouts.pdf');

    }
    // ฟังก์ชันสำหรับส่งอีเมล
    private function sendReportEmail(Request $request, $pdf)
    {
        // รับข้อมูลจากฟอร์ม
        $sendToEmail = $request->input('sendToEmail');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // ส่งอีเมล
        Mail::to($sendToEmail)
            ->send(new ReportEmail($pdf->output(), $subject, $message));
    }
    

}
