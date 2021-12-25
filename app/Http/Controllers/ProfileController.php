<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Talk;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function store(Request $request, Profile $profile)
    {
        $input = $request['profile'];
        $input += ['user_id' => $request->user()->id];    
        $profile->fill($input)->save();
        // 前の画面に戻る
        return redirect('/home')->with(['profiles' => $profile]);
    }
    
    
    // ユーザー設定画面へ
    public function index(Profile $profile,User $teams)
    {   
        // $teams = DB::table('teams')->pluck('team_name');
        return view('users.setting')->with(['profile' => $profile,'users' => $profile->getByProfile()]);
        
    }
    
    public function change(Request $request, Profile $profile,Talk $talk)
    {   
        $profile->where('user_id',Auth::id())->delete();
        $input = $request['profile'];
        $input += ['user_id' => $request->user()->id];    
        $profile->fill($input)->save();
        return view('/home')->with(['talks' => $talk->get()]);
    }
    
   
}
