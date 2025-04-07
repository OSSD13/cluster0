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
        'tm_trc_id',
    ];

    public function teamSettingTrello()
    {
        return $this->belongsTo(SettingTrello::class, 'tm_stl_id');
    }
}
