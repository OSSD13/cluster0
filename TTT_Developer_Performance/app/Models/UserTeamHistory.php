<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teams;
use App\Models\Users;


class UserTeamHistory extends Model
{
    use HasFactory;

    protected $table = 'user_team_history';

    protected $fillable = [
        'uth_id',
        'uth_usr_id',
        'uth_tm_id',
        'uth_start_date',
        'uth_end_date',
        'uth_is_current',
    ];

    public function user()
{
    return $this->belongsTo(Users::class, 'uth_usr_id', 'usr_id');
}

public function team()
{
    return $this->belongsTo(Teams::class, 'uth_tm_id', 'tm_id');
}

}
