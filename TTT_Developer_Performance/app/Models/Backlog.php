<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    protected $table = 'backlogs';
    protected $primaryKey = 'blg_id';
    public $timestamps = false;

    protected $fillable = [
        'blg_pass_point',
        'blg_personal_point',
        'blg_bug',
        'blg_cancel',
        'blg_is_use',
        'blg_uth_id',
        'blg_spr_id'
    ];
}
