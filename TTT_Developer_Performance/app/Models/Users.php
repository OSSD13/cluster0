<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'usr_id';
    public $timestamps = false;
    protected $table = 'users';

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
}

