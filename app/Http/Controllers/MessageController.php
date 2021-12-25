<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Message;

class MessageController extends Controller
{
    public function show(Message $message)
    {
        return view('messages.show')->with(['messages' => $message]);
    }
    
    public function store(Request $request, Message $message,Talk $talk)
    {
        $input = $request['message'];
        $input += ['user_id' => $request->user()->id]; 
        $input += ['talk_id' => $talk->id]; 
        $message->fill($input)->save();
        return redirect('/talks/'.$talk->id);
    }
        
    public function delete(Message $message,Talk $talk)
    {
        $message->delete();
        return view('talks.show')->with(['messages' => $message,'$talk' => $talk]);
    }
}
