<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointCurrentSprint extends Model
{
    use HasFactory;
    protected $table = 'points_current_sprint';
    protected $primaryKey = 'pcs_id';
    public $timestamps = false;

    protected $fillable = [ //ชื่อตรงกับฟิลด์ดาต้าเบต
        'pcs_spr_id',
        'pcs_mnc_id',
        'pcs_blg_id',
        'pcs_ext_id',
        'pcs_uth_id',
        'pcs_assign_usr_id',
        'pcs_pass',
        'pcs_bug',
        'pcs_cancel',
        'pcs_day_off',
        'pcs_is_use'

    ];

    public function sprint(){
        return $this->belongsTo(Sprint::class, 'pcs_spr_id');
    }
    public function minorCase()
    {
        return $this->belongsTo(MinorCase::class, 'pcs_mnc_id');
    }

    public function backlog()
    {
        return $this->belongsTo(Backlog::class, 'pcs_blg_id');
    }

    public function extraPoint()
    {
        return $this->belongsTo(Extrapoint::class, 'pcs_ext_id');
    }

    public function userTeamHistory()
    {
        return $this->belongsTo(UserTeamHistory::class, 'pcs_uth_id');
    }

    public function assignedUser()
    {
        return $this->belongsTo(Users::class, 'pcs_assign_usr_id');
    }

}
