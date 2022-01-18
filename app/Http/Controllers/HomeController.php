<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }
    
    
}
