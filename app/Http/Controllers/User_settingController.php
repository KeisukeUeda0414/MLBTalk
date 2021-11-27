<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_setting;

class User_settingController extends Controller
{
    
    public function user_setting(User_setting $post)
    {
        return view('user_setting')->with(['posts' => $post->get()]);
    }
    
    public function store(Request $request, User_setting $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    
}
