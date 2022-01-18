@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    
    <body>
       <div>
           ニックネーム　　{{$user->profile->nickname}}<br>
           お気に入りチーム　　{{$user->profile->team->team_name}}<br>
           自己紹介　　{{$user->profile->introduction}}<br>
            @if($user->id===Auth::id())
            <!--設定-->
                <div class="">
                    <a href='/profile/setting'>プロフィールを変更する</a>   
                </div>
            @else
            フォローする 
            @endif
           
       </div>
    </body>
</html>

@endsection