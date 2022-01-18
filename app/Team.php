<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function profiles(){
        return $this->hasMany('App\Profile');  
    }
    
    public function talks(){
        return $this->hasMany('App\Talk');  
    }
}
