<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Talk;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{
    public function store(ReplyRequest $request,Talk $talk, Message $message,Reply $reply)
    {
        $input = $request['reply'];
        $input += ['message_id' => $message->id];
        $input += ['user_id' => $request->user()->id];
        $reply->fill($input)->save();
        return redirect('/talks/'.$talk->id);
    }
    
     public function create(Talk $talk,Message $message)
    {
       
        return view('replies.create')->with(['message' => $message,'talk'=>$talk]);
    }
      public function show(Talk $talk,Message $message, Reply $reply)
    {
        return view('replies.show')->with(['reply' => $reply]);
    }
    
    public function delete(Talk $talk,Message $message,Reply $reply)
    {
        $reply->delete();
        return view('talks.show')->with(['talk' => $talk,'user' => Auth::user()]);
    }
}
