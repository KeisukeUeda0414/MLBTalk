<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Talk;
use App\Team;
use Storage;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    
    
    // ユーザー設定画面へ
    public function index(Profile $profile,Team $team)
    {   
        $teams = $team->get();
        return view('users.setting')->with(['teams' => $teams,'profile' => $profile,'users' => $profile->getByProfile()]);
        
    }
    
    public function store(Request $request, Profile $profile ,User $user)
    {
        $post = new Profile;
        $form = $request->all();
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('players', $image, 'public');
        // アップロードした画像のフルパスを取得
        $image->image_path = Storage::disk('s3')->url($path);
        $input = $request['profile'];
        $input += ['user_id' => $request->user()->id]; 
        $input += ['icon' => $image->image_path]; 
        $profile->fill($input)->save();
        
        $request->session()->flash('status', '登録が完了しました');
        return redirect('/home')->with(['profiles' => $profile,'user' => Auth::user()]);
    }
    
    public function change(Request $request, Profile $profile,Talk $talk ,User $user)
    {   
        $profile->where('user_id',Auth::id())->delete();
     
        $post = new Profile;
        $form = $request->all();
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('players', $image, 'public');
        // アップロードした画像のフルパスを取得
        $image->image_path = Storage::disk('s3')->url($path);
        $input = $request['profile'];
        $input += ['user_id' => $request->user()->id]; 
        $input += ['icon' => $image->image_path]; 
        $profile->fill($input)->save();
        $request->session()->flash('status', '変更が完了しました');
        
        return view('/home')->with(['talks' => $talk->get(),'user' => Auth::user()]);
    }
    
   
}
