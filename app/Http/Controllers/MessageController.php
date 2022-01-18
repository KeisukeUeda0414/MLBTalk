<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Reply;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show(Talk $talk,Message $message)
    {
        $login_id = Auth::id();
        return view('messages.show')->with(['messages' => $message,'login_id'=>$login_id,'talk' => $talk]);
    }
    
    public function store(Request $request, Message $message,Talk $talk)
    {
        $input = $request['message'];
        $input += ['user_id' => $request->user()->id];
        $input += ['talk_id' => $talk->id];
        
        $message->fill($input)->save();
        return redirect('/talks/'.$talk->id);
    }
    
   
        
    public function delete(Talk $talk,Message $message)
    {
        $message->delete();
        return view('talks.show')->with(['messages' => $message,'talk' => $talk,'user' => Auth::user()]);
    }
}
