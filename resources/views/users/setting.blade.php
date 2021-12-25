@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/">
        <title>User</title>
        <!-- Fonts -->
        
    </head>
    
    <body>
        <h1>ユーザー詳細設定</h1>
        
        
       
　　　　
        
            @if($profile->where('user_id', Auth::id())->exists())
                <form action="/profile/set/exists" method="POST">
                    @csrf
                    <!--ニックネーム入力-->
                    <div class="body_comment">
                        <p>ニックネーム</p>
                        <textarea class="comment_input" name="profile[nickname]" placeholder="ニックネームを入力"></textarea><p></p>
                    </div>
                    <!--自己紹介入力-->
                    <div class="body_comment">
                        <p>自己紹介</p>
                        <textarea class="comment_input" name="profile[introduction]" placeholder="自己紹介を入力"></textarea><p></p>
                    </div>
                  
                    
                    <!--送信ボタン-->
                    <input class="send_profile" type="submit" value="送信"/>
                </form>
                
            @else
                    <form action="/profile/set/unexists" method="POST">
                    @csrf
                        <div class="body_comment">
                            <p>ニックネーム</p>
                            <textarea class="comment_input" name="profile[nickname]" placeholder="ニックネームを入力"></textarea><p></p>
                        </div>
                    <!--自己紹介入力-->
                        <div class="body_comment">
                            <p>自己紹介</p>
                            <textarea class="comment_input" name="profile[introduction]" placeholder="自己紹介を入力"></textarea><p></p>
                        </div>
              
                
                    <!--送信ボタン-->
                        <input class="send_profile" type="submit" value="送信"/>
                        
                    </form>
            @endif
        
        
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection