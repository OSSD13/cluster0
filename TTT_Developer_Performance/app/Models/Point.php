<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'points';

    protected $primaryKey = 'pts_id';

    public $timestamps = false;
    protected $fillable = [
        'pts_uth_id',
        'pts_type',
        'pts_value',
        'pts_spr_id',
        'pts_version_id',
        'pts_created_time',
        'pts_is_use',
        'pts_dayoff',
        'pts_daymard',
        'pts_crd_detail',
        'pts_defect_detail'
    ];

    public function userTeamHistory()
    {
        return $this->belongsTo(UserTeamHistory::class, 'pts_uth_id');
    }
    public function version()
    {
        return $this->belongsTo(Version::class, 'pts_ver_id');
    }
    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'pts_spr_id');
    }



}
