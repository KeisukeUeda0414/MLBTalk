@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/talkroom.css">
    </head>
    <body>
        
       
         <h1 class="title">
            {{$talk->title}}<p></p>
        </h1>
        
        @foreach($messages as $talk)
            {{$talk->body}}<p></p>
        @endforeach
        
        
        
      
        
        
        
        
        
        <form action="/store" method="POST">
            @csrf
            <!--コメント入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[body]" placeholder="コメントを入力"></textarea>
            </div>
            <!--トークルームidを保存（hiddenを使用）-->
            <input type="hidden" name="post[talk_id]" value="{{$talk->id}}">
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="送信"/>
            
            
        </form>
        
        
        
        
        
    </body>
</html>
@endsection