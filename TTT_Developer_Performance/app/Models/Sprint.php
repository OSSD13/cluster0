<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprints';
    protected $primaryKey = 'spr_id';
    public $timestamps = false;

    protected $fillable = [
        'spr_year',
        'spr_number',
        'spr_date_start',
        'spr_date_finish',
        'spr_created_time',
    ];
}
