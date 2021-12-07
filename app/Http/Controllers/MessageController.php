<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Message;

class MessageController extends Controller
{
    public function create(Talk $talk)
{
    return view('talkroom')->with(['talks' => $talk->get()]);
    
}

public function store(Request $request, Message $post,Talk $talk)
    {
      
        $input = $request['post'];
        // $ido=$talk->get();
        // $input = array_merge($input,array('talk_id'=>$ido->id)); 
       
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    
}
