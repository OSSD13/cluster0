<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrelloCredential extends Model
{
    protected $table = 'trello_credentials';
    protected $primaryKey = 'trc_id';
    public $timestamps = false;

    protected $fillable = [
        'trc_api_key',
        'trc_api_token',
        'trc_usr_id',
    ];

    public function trelloCredential()
    {
        return $this->belongTo(User::class, 'trc_usr_id');
    }
}
