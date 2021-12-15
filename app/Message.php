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
        'title'
        
    ];
    
    public function likes(){
    //likesテーブルとのリレーション
    return $this->belongsToMany('App\Like');
    }
    
  public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

}
