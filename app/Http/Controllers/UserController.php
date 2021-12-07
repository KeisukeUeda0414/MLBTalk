<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function user_set(User $teams)
    {   
        
        $teams = DB::table('teams')->pluck('team_name');
        return view('users.setting')->with(['prefectures' => $teams]);
    }
    
    public function store(Request $request, User $post)
    {
       
        
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    public function teamselect(User $post)
    {  
    }
    
  
    
}
