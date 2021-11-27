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
        <h1>ユーザー詳細画面</h1>
        <form action="/posts_user_setting" method="POST">
            @csrf
            <!--コメント入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[nickname]" placeholder="ニックネームを入力"></textarea>
            </div>
            <!--自己紹介入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[selfintroduction]" placeholder="自己紹介を入力"></textarea>
            </div>
            <!--お気に入りチーム入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[team]" placeholder="コメントを入力"></textarea>
            </div>
            
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="送信"/>
        </form>
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection