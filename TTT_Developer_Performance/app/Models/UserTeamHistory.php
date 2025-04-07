<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTeamHistory extends Model
{
    protected $table = 'user_team_history';
    protected $primaryKey = 'uth_id';
    public $timestamps = false;

    protected $fillable = [
        'uth_end_date',
        'uth_is_current',
        'uth_start_date',
        'uth_tm_id',
        'uth_usr_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uth_usr_id', 'usr_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'uth_tm_id', 'tm_id');
    }
}
