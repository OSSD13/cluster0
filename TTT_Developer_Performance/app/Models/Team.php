<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'tm_id';
    public $timestamps = false;

    protected $fillable = [
        'tm_is_use',
        'tm_name',
        'tm_stl_id',
        'tm_trello_boardname',
    ];
}
