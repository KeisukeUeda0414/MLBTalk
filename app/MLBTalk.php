<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MLBTalk extends Model
{
    protected $table = 'mlbtalks';
    
    protected $fillable = [
    'body',
    'title',
];
}
