<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MLBTalk;

class MLBTalkController extends Controller
{
    
    public function talkroom(MLBTalk $post)
    {
        return view('talkroom')->with(['posts' => $post->get()]);
    }
    
    public function user_setting(User_setting $post)
    {
        return view('user_setting')->with(['posts' => $post->get()]);
    }
    
    public function store(Request $request, MLBTalk $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/talkroom');
    }
    
    public function delete(MLBTalk $post)
    {
        $post->delete();
        return redirect('/talkroom');
    }

}
