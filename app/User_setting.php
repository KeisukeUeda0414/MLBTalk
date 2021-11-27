<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_setting extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
    'nickname',
    'selfintroduction',
    'team'
];
}
