<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    protected $primaryKey = 'blg_id';

    protected $table = 'backlogs';
    public $timestamps = false;
    protected $fillable = [
        'blg_pass_point',
        'blg_personal_point',
        'blg_bug',
        'blg_cancel',
        'blg_is_use',
        'blg_uth_id',
        'blg_spr_id'
    ];

    // ความสัมพันธ์กับตารางอื่นๆ
    public function userTeamHistory()
    {
        return $this->belongsTo(UserTeamHistory::class, 'blg_uth_id', 'uth_id');
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'blg_spr_id', 'spr_id');
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            UserTeamHistory::class,
            'uth_id', // Foreign key on UserTeamHistory table
            'usr_id', // Foreign key on User table
            'blg_uth_id', // Local key on Backlog table
            'uth_usr_id' // Local key on UserTeamHistory table
        );
    }

    public function team()
    {
        return $this->hasOneThrough(
            Team::class,
            UserTeamHistory::class,
            'uth_id', // Foreign key on UserTeamHistory table
            'tm_id', // Foreign key on Team table
            'blg_uth_id', // Local key on Backlog table
            'uth_tm_id' // Local key on UserTeamHistory table
        );
    }
}
