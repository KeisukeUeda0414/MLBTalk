@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
       
    </head>
   
      
       
            <div class="d-flex justify-content-between">
                <div>
                    <a class="fs-3 p-2 bd-highlight btn btn-primary" href="/talks/create" role="button">トークルームを作成する</a><br></br>
                </div>
                <div class="d-flex flex-row-reverse bd-highlight">
                    <a href='profile/setting'><i class="fas fa-cog fs-1"></i></a>   
                </div>
            </div>
            
            
            <!--トークルームとprofileのリレーション-->
            @foreach ($talks as $talk)
                
                <a href="/talks/{{$talk->id}}">{{$talk->title}}</a><br></br>
            @endforeach
            
        
        
         
            
            <form class="mb-2 mt-4 text-center" method="GET" action="/talk/search">
                <input class="form-control my-2 mr-5" type="search" placeholder="トークルーム名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info my-2" type="submit">検索</button>
                    <button class="btn btn-secondary my-2 ml-5">
                        <a href="/home" class="text-white">クリア</a>
                    </button>
                </div>
            </form>
        

        
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   
    </body>
</html>
@endsection
