@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        [<a href='/user_setting'>ユーザー詳細画面へ</a>]
        [<a href='/talkroom'>トークルームへ</a>]
    </body>
</html>
@endsection
