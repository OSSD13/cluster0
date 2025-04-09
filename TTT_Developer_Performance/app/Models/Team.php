<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'tm_id';
    public $timestamps = false;

    protected $fillable = [
        'tm_name',
        'tm_trello_boardname',
        'tm_is_use',
        'tm_stl_id',
        'tm_trc_id'
        
    ];

    public function settingTrelloList()
    {
        return $this->belongsTo(SettingTrello::class, 'tm_stl_id');
    }
    public function TrelloCretential()
    {
        return $this->hasMany(UserTeamHistory::class, 'tm_stl_');
    }
    public function members(){
        return $this->belongsToMany(User::class, 'user_team_history', 'uth_tm_id', 'uth_usr_id')
        ->withPivot(['uth_start_date', 'uth_end_date', 'uth_is_current'])
        ->wherePivot('uth_is_current', 1);
    }
    
}
