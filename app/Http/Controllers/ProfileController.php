<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    
    public function profile_set(Profile $post)
    {
        return view('profile_setting')->with(['posts' => $post->get()]);
    }
    
    public function store(Request $request, Profile $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/home');
    }
    
    
}
