<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'usr_id';
    public $timestamps = false;

    protected $fillable = [
        'usr_email',
        'usr_google_id',
        'usr_is_use',
        'usr_name',
        'usr_password',
        'usr_role',
        'usr_trello_fullname',
        'usr_username',
    ];

    protected $hidden = [
        'usr_password',
    ];
}
