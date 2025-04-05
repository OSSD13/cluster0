<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprints';
    protected $primaryKey = 'spr_id';
    public $timestamps = false;

    protected $fillable = [
        'spr_created_time',
        'spr_date_finish',
        'spr_date_start',
        'spr_number',
        'spr_year',
    ];
}
