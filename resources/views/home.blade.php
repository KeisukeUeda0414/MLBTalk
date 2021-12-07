@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
    </head>
    <body>
        
      
        
        
        
        <div>
            <a href='/talkroom_making'>トークルームを作成する</a>
        </div>
        <div>
            [<a href='/user_setting'>ユーザー詳細画面へ</a>]
            <p>最新トーク</p>
                @foreach ($talkrooms as $talkroom)
                    <a href='talkroom/{{$talkroom->id}}'>{{$talkroom->title}}</a><p></p>
                @endforeach
        </div>
     
       
        
        
    </body>
</html>
@endsection
