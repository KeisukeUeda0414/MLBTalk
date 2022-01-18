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
        //likesテーブルとの中間テーブルリレーション命名規則に則っていないので、第二引数にlikesを入れている
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function replies()   
    {
        return $this->hasMany('App\Reply');  
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }
    
    
}
