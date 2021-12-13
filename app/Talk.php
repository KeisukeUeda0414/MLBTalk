<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
   
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];

    public function getRouteKeyName(){
        return 'id';
    }

    public function messages()   
    {
        return $this->hasMany('App\Message');  
    }
    
    // トークルーム別にメッセージを振り分け
    public function getByTalk(int $limit_count = 10)
    {
        return $this->messages()->with('talk')->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
