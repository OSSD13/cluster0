<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTrello extends Model
{
    protected $table = 'setting_trello';
    protected $primaryKey = 'stl_id';
    public $timestamps = false;

    protected $fillable = [
        'stl_bug',
        'stl_cancel',
        'stl_done',
        'stl_inprogress',
        'stl_minor_case',
        'stl_name',
        'stl_todo',
        'stl_trc_id',
    ];
}
