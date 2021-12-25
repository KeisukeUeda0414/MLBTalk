<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use Auth;

class LikeController extends Controller
{
    
    public function store(Message $message)
    {
        $message->users()->attach(Auth::id());
        return back();
    }



public function destroy(Message $message)
    {
        $message->users()->detach(Auth::id());
        return back();
    }
    
}
