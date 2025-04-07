<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'usr_id';

    protected $fillable = [
        'usr_username',
        'usr_email',
        'usr_password',
        'usr_name',
        'usr_trello_fullname',
        'usr_role',
        'usr_is_use',
        'usr_google_id'
    ];

    protected $hidden = [
        'usr_password',
    ];

    public function getAuthPassword()
    {
        return $this->usr_password; // ระบุฟิลด์รหัสผ่านให้ Laravel ใช้
    }
    public function teamHistories()
    {
        return $this->hasMany(UserTeamHistory::class, 'uth_usr_id', 'usr_id');
        // หาก primary key เป็น usr_id ให้เปลี่ยน 'id' เป็น 'usr_id'
    }
}

