@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        
        <meta charset="utf-8">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
       
        
    </head>
    <body>
        @if (session('status'))
            <div class="flash_message bg-success text-center py-3 my-0">
                {{ session('status') }}
            </div>
        @endif
        @if (session('flash_message'))
                $(function () {
                        toastr.success('{{ session('flash_message') }}');
                });
            @endif
       
        <div>
            <div class="fs-1">
                {{Auth::user()->profile->team->team_name}}ファンの{{Auth::user()->profile->nickname}}
            </div>
            
            <div>
                <img class="rounded-circle" src="{{Auth::user()->profile->icon}}">
            </div>
        </div>
            
        
        
         <div class="container ">
        @foreach($articles as $article)
         {{$article['title']}}
        @endforeach
    </div>
       
            <div class="d-flex justify-content-between">
                <div>
                    <a class="fs-3 p-2 bd-highlight btn btn-primary" href="/talks/create" role="button">トークルームを作成する</a><br></br>
                </div>
                <!--設定-->
                <div class="d-flex flex-row-reverse bd-highlight">
                    <a href='/profile/setting'><i class="fas fa-cog fs-1"></i></a>   
                </div>
            </div>
            
            <form class="mb-2 mt-4 text-center" method="GET" action="/talk/search" onSubmit="return ShowAlart()" name="talk">
                <input class="form-control my-2 mr-5" type="search" placeholder="トークルーム名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info my-2" type="submit">検索</button>
                    <button class="btn btn-secondary my-2 ml-5">
                        <a href="/home" class="text-white">クリア</a>
                    </button>
                </div>
            </form>
            
            <!--トークルームとprofileのリレーション-->
            <div class="h2 team_color">最新トーク</div>
            @foreach ($talks as $talk)
                
                <a class="h2" href="/talks/{{$talk->id}}">{{$talk->title}}</a><br></br>
            @endforeach
            
            <div>
                <p class="h2 team_color">マイトークルーム</p>
                
               
            </div>
        
        <script>
            function ShowAlart() {
                if(document.talk.search.value == "") {
                    alert("トークルーム名を入力してください");
                    return false;
                }
                
            }
        </script>
        <script src="/MLB_Talk/public/js/home.js"></script>
        <!--bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        
    </body>
</html>
@endsection
