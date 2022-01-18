<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Message;
use Auth;

class LikeController extends Controller
{
    
    public function store(Message $message)
    {
        // $user->messages()->attach(Auth::id());
        // return back();
        $message->users()->attach(Auth::id());
        return back();
    }



public function destroy(Message $message)
    {
        $message->users()->detach(Auth::id());
        return back();
    }
    
}
