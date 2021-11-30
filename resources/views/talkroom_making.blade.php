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
        <h1>トークルーム詳細画面</h1>
        <form action="/talkroom_making_finished" method="POST">
            @csrf
            <!--トークルーム名入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[title]" placeholder="トークルーム名を入力"></textarea>
            </div>
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="送信"/>
        </form>
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection