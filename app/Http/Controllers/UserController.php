<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Profile;
use App\Talk;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function store(Request $request, User $profile)
    {
        $input = $request['post'];
        $profile->fill($input)->save();
        return redirect('/home');
    }
    
     //ホーム画面への遷移
    public function home(Talk $talk,User $user)
    {   
        $url = 'https://newsapi.org/v2/everything?q=bitcoin&apiKey='. config('newsapi.news_api_key');
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();
        
        // リクエスト送信
        $response = $client->request('GET',  $url);   
        $news = json_decode($response->getBody(), true);
        $articles = $news['articles'];
        return view('home')->with(['talks' => $talk->get(),'articles' => $articles]);
    }
    
    public function show(User $user)
    { 
        return view('users.show')->with(['user' => $user]);
    }
    
    public function like(User $user)
    {   
        $user->messages()->attach(Auth::id());
        return back();
    }



public function destroy(Message $message)
    {
        $message->users()->detach(Auth::id());
        return back();
    }
}
