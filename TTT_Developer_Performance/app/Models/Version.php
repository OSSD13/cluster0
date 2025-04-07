<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versions';
    protected $primaryKey = 'ver_id';
    public $timestamps = false;

    protected $fillable = [
        'ver_created_time',
        'ver_editor_id',
        'ver_spr_id',
        'ver_version',
    ];
}
