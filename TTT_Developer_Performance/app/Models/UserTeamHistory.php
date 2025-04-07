<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTeamHistory extends Model
{
    protected $table = 'user_team_history';
    protected $primaryKey = 'uth_id';
    public $timestamps = false;

    protected $fillable = [
        'uth_usr_id',
        'uth_tm_id',
        'uth_start_date',
        'uth_end_date',
        'uth_is_current',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'uth_usr_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'uth_tm_id');
    }


}
