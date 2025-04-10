<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('email_form');
    }

    public function sendEmail(Request $request)
    {
        // ตรวจสอบให้แน่ใจว่า message คือข้อความที่ผู้ใช้ส่งมา
        $data = [
            'to' => $request->to,
            'subject' => $request->subject,
            'message' => $request->message,  // ให้แน่ใจว่า message เป็น string
            'name' => 'Your Name'  // ชื่อผู้ส่ง
        ];

        // ส่งข้อมูลไปยัง view และใช้ข้อมูลจาก $data
        Mail::send('email', $data, function($message) use ($data) {
            $message->to($data['to'])
                    ->subject($data['subject']);
            $message->from('xyz@gmail.com', $data['name']);
        });

        return "Email Sent. Check your inbox.";
    }
}
