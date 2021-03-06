<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // protected $teams = 'teams';
   
    //   いいね機能
   public function likes()
    {
        return $this->belongsToMany('App\Message','likes')->withTimestamps();
    }
    
    // usersとのリレーション
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    
    public function messages()   
    {
        return $this->hasMany('App\Message');  
    }
    public function talks()   
    {
        return $this->hasMany('App\Talk');  
    }
    
    
    
    
}
