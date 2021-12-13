<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Message;

class TalkController extends Controller
{
    //ホーム画面への遷移
    public function talk(Talk $talk)
    {
        return view('home')->with(['talkrooms' => $talk->get()]);
    }
    
    //トーク作成画面への遷移
    public function roommake(Talk $talk)
    {
       
        return view('talks.create')->with(['talkrooms' => $talk->get()]);
    }
    
    
    
    
    //トークルームへ遷移
    public function show(Talk $talk )
    {
        // return view('talks.show')->with(['talks' => $talk->getByTalk()]);
        
        return view('talks.show')->with(['talk' => $talk,'messages' => $talk->getByTalk()]);
        
        }
    
   
    
    public function store_roomtitle(Request $request, Talk $post)
    {
        $input = $request['talkroom'];
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    public function delete(Talk $talk)
    {
        $talk->delete();
        return redirect('/home');
    }

}
