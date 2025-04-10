<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;
    public $filePath;

    // สร้าง constructor รับข้อมูล email และไฟล์
    public function __construct($emailData, $filePath)
    {
        $this->emailData = $emailData;
        $this->filePath = $filePath;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->emailData['subject'],
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.report', // ใส่ชื่อ view สำหรับเนื้อหาอีเมลที่ต้องการ
            with: [
                'message' => $this->emailData['message'],
            ]
        );
    }

    public function attachments()
    {
        // ตรวจสอบว่า path ของไฟล์มีค่าหรือไม่
        if ($this->filePath && file_exists($this->filePath)) {
            return [
                // แนบไฟล์ PDF
                $this->attach($this->filePath, [
                    'as' => 'report.pdf',  // กำหนดชื่อไฟล์ที่แนบ
                    'mime' => 'application/pdf', // กำหนด MIME type
                ])
            ];
        }

        return [];
    }
}