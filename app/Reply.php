<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Reply extends Model
{
    
    public function talk()  
    {
        return $this->belongsTo('App\Talk');  
    }

    protected $fillable = [
        'body',
        'talk_id',
        'message_id',
        'user_id',
     
    ];
    
    public function message()
    {
        return $this->belongsTo('App\Message');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //  public function getByMessage(int $limit_count = 100)
    // {
    //     return $this->message()->with('talk')->orderBy('updated_at', 'ASC')->paginate($limit_count);
    // }
}
