<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTrello extends Model
{
    protected $table = 'setting_trello';
    protected $primaryKey = 'stl_id';
    public $timestamps = false;

    protected $fillable = [
        'stl_trc_id',
        'stl_name',
        'stl_todo',
        'stl_inprogress',
        'stl_done',
        'stl_bug',
        'stl_minor_case',
        'stl_cancel',
    ];

    public function settingTrello(){
        return $this->belongsTo(TrelloCredential::class, 'stl_trc_id');
    }
}
