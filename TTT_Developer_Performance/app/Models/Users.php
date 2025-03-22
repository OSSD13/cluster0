<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users';

    protected $fillable = [
        'usr_username', 
        'usr_email', 
        'usr_password', 
        'usr_name', 
        'usr_trello_fullname', 
        'usr_role',
        'usr_is_use'
    ];
}
