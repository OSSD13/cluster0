<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

    // คุณสามารถกำหนดชื่อคอลัมน์สำหรับ `deleted_at` ได้หากต้องการ
class Backlog extends Model
{
    protected $table = 'backlogs';
    protected $primaryKey = 'blg_id';
    public $timestamps = false;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'blg_pass_point',
        'blg_personal_point',
        'blg_bug',
        'blg_cancel',
        'blg_is_use',
        'blg_uth_id',
        'blg_spr_id',
    ];
}
