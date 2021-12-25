<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
   
    
    public function store(Request $request, User $profile)
    {
       
        
        $input = $request['post'];
        $profile->fill($input)->save();
        return redirect('/home');
    }
    
    public function teamselect(User $post)
    {  
    }
    
  
    
}
