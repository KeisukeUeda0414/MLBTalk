@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/talkroom.css">
        <title>talkroom</title>
        <!-- Fonts -->
        
    </head>
    <body>
        <h1>{{$talkrooms->title}}</h1>
            @method('DELETE')
        <!--チャット欄-->
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <!--コメント内容-->
                <div class='body'><a href="delete_confirm">{{ $post->body }}</a></div>
                <!--いいね-->
                <div class="good">👍</div>
                <tr>
                <!--ユーザー名-->
                <!--<td class="user_name">{{Auth::user()->name}}</td>-->
                <!--投稿時間-->
                <!--<td class="post_time">{{$post->created_at}}</td>-->
                </tr>
                <!--空行-->
                <p></p>
            </div>
            @endforeach
        </div>
        
        <form action="/posts" method="POST">
            @csrf
            <!--コメント入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[body]" placeholder="コメントを入力"></textarea>
            </div>
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="送信"/>
        </form>
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection