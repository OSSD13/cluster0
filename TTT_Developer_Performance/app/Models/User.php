<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // กำหนดชื่อตาราง
    protected $table = 'user';

    // กำหนด Primary Key
    protected $primaryKey = 'usr_id';

    // อนุญาตให้ทำการเพิ่ม/แก้ไขข้อมูลในคอลัมน์เหล่านี้
    protected $fillable = [
        'usr_username',
        'usr_email',
        'usr_password',
        'usr_name',
        'usr_trello_name',
        'usr_role',
    ];

    // กำหนดให้ไม่ต้องใช้ timestamps (หากไม่ได้ใช้ created_at, updated_at)
    public $timestamps = true;
}