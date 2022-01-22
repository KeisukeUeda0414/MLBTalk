<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Talk;
use App\Team;
use Storage;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // ユーザー設定画面へ
    public function index(Profile $profile,Team $team)
    {   
        $teams = $team->get();
        return view('users.setting')->with(['teams' => $teams,'profile' => $profile,'users' => $profile->getByProfile()]);
    }
    
    public function store(ProfileRequest $request, Profile $profile)
    {
        $post = new Profile;
        $form = $request->all();
        //s3アップロード開始
        $image = $request->file('image');
        
        if (is_null($image)){
            $input = $request['profile'];
            $input += ['user_id' => $request->user()->id]; 
            $input += ['icon' => 'https://mlbtalk.s3.ap-northeast-1.amazonaws.com/players/Free1.png']; 
        }else{
            // バケットの`players`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('players', $image, 'public');
            // アップロードした画像のフルパスを取得
            $image->image_path = Storage::disk('s3')->url($path);   
            $input = $request['profile'];
            $input += ['user_id' => $request->user()->id]; 
            $input += ['icon' => $image->image_path]; 
        }
        
        $profile->fill($input)->save();
        $request->session()->flash('status', '登録が完了しました');
        
        // ニュース
        $url = 'https://newsapi.org/v2/everything?q=大谷翔平+MLB&sortBy=popularity&apiKey='. config('newsapi.news_api_key');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET',  $url);   
        $news = json_decode($response->getBody(), true);
        $articles = $news['articles'];
        return redirect('/home')->with(['profiles' => $profile,'articles' => $articles]);
    }
    
    public function change(ProfileRequest $request, Profile $profile,Talk $talk)
    {   
        $profile->where('user_id',Auth::id())->delete();
     
        $post = new Profile;
        $form = $request->all();
        //s3アップロード開始
        $image = $request->file('image');
        
       if (is_null($image)){
            $input = $request['profile'];
            $input += ['user_id' => $request->user()->id]; 
            $input += ['icon' => 'https://mlbtalk.s3.ap-northeast-1.amazonaws.com/players/Free1.png']; 
        }else{
            // バケットの`players`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('players', $image, 'public');
            // アップロードした画像のフルパスを取得
            $image->image_path = Storage::disk('s3')->url($path);   
            $input = $request['profile'];
            $input += ['user_id' => $request->user()->id]; 
            $input += ['icon' => $image->image_path]; 
        }
        $profile->fill($input)->save();
        $request->session()->flash('status', '変更が完了しました');
        // ニュース
        $url = 'https://newsapi.org/v2/everything?q=大谷翔平+MLB&sortBy=popularity&apiKey='. config('newsapi.news_api_key');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET',  $url);   
        $news = json_decode($response->getBody(), true);
        $articles = $news['articles'];
        return redirect('/home')->with(['talks' => $talk->get(),'articles' => $articles]);
    }
    
   
}
