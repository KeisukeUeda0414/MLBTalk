<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    //ホーム画面への遷移
    public function talk(Talk $talk)
    {
    // dd($profile);
        return view('home')->with(['talks' => $talk->get()]);
    }
}
