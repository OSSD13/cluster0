<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinorCase extends Model
{
    use HasFactory;
    protected $table = 'minor_cases';

    protected $primaryKey = 'mnc_id';
    public $timestamps = false;

    protected $fillable = [ //ชื่อตรงกับฟิลด์ดาต้าเบต
        'mnc_personal_point',
        'mnc_card_detail',
        'mnc_defect_detail',
        'mnc_point',
        'mnc_is_use'
    ];
}
