@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <div>
            <a href='/talkroom_making'>トークルームを作成する</a>
        </div>
        [<a href='/profile_setting'>ユーザー詳細画面へ</a>]
        @foreach ($talkrooms as $talkroom)
            [<a href='talkroom/{{$talkroom->id}}'>{{$talkroom->title}}</a>]
        @endforeach
    </body>
</html>
@endsection
