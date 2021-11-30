<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;

class TalkController extends Controller
{
    //ホーム画面への遷移
    public function talk(Talk $table)
    {
        return view('home')->with(['talkrooms' => $table->get()]);
    }
    
    //トーク作成画面への遷移
    public function roommake(Talk $table)
    {
        return view('talkroom_making')->with(['talkrooms' => $table->get()]);
    }
    
    //トークルームへ遷移
    public function talkroom(Talk $table)
    {
        return view('talkroom_show')->with(['talkrooms' => $table->first()]);
    }
    
    
    public function user_setting(User_setting $post)
    {
        return view('user_setting')->with(['posts' => $post->get()]);
    }
    
    public function store(Request $request, Talk $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/talkroom');
    }
    
    public function store_roomtitle(Request $request, Talk $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    public function delete(Talk $post)
    {
        $post->delete();
        return redirect('/talkroom');
    }

}
