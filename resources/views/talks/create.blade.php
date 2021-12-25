@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!--トークルーム作成画面-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/">
        <title>Talk</title>
        <!-- Fonts -->
        
    </head>
    
    <body>
        <h1>トークルーム作成画面</h1>
        <form action="/talks" method="POST">
            @csrf
            <!--トークルーム名入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="talkroom[title]" placeholder="トークルーム名を入力"></textarea>
            </div>
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="作成"/>
        </form>
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection