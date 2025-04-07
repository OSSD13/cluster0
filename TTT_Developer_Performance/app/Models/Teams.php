<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'tm_id'; // ถ้า primary key ไม่ใช่ 'id'

    protected $fillable = [
        'tm_id',
        'tm_name',
        'tm_trello_boardname',
        'tm_stl_id',
        'tm_is_use'
    ];
}
