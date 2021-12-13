<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Message extends Model
{
    public function messages(){
    //messagesテーブルとのリレーション
    return $this->belongsToMany('App\Message');
    }


}
