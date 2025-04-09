<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPoint extends Model
{
    use HasFactory;
    protected $table =  'extra_points';
    protected $primaryKey = 'ext_id';
    public $timestamps = false;

    protected $fillable = [
        'ext_id',
        'ext_value',
        'ext_is_use',
        'ext_spr_id',
        'ext_uth_id'
    ];


}
