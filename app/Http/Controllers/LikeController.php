<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use Auth;

class LikeController extends Controller
{
    
    public function store(Message $post)
    {
        $post->users()->attach(Auth::id());

        return back();
    }



public function destroy(Message $post)
    {
        $post->users()->detach(Auth::id());

        return back();
    }
    
}
