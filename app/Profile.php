<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    
    protected $fillable = [
        'nickname',
        'introduction',
        'user_id',
        'team_id',
        'icon'
        
    ];
    
    public function getByProfile(int $limit_count = 100)
    {
        return $this->user()->with('profile')->paginate($limit_count);
    }
    
    public function getByCategory2(int $limit_count = 5)
    {
         return $this->messages()->with('message')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function messages()   
    {
        return $this->hasMany('App\Message');  
    }
    
    public function talk(){
        return $this->belongsToMany('App\Talk');
    }
    
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    public function user()   
    {
        return $this->belongsTo('App\User');  
    } 
   
    
}
