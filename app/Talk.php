<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talkrooms';
    
    protected $fillable = [
    'title',
];
}
