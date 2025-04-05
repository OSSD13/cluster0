<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $primaryKey = 'crd_id';


    protected $fillable = [
        'crd_trc_id',
        'crd_trello_id',
        'crd_boardname',
        'crd_listname',
        'crd_title',
        'crd_detail',
        'crd_member_fullname',
        'crd_point',
    ];
}

