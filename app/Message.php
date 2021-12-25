<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Message extends Model
{
    
    public function talk()  
    {
        return $this->belongsTo('App\Talk');  
    }

    protected $fillable = [
        'body',
        'talk_id',
        'title',
        'user_id',
     
    ];
    
    public function likes(){
        //likesテーブルとのリレーション
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }
    
 

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    
}
