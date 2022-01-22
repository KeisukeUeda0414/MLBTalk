
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
       
        <div class="text-center">
            <a  href="/users/{{Auth::user()->id}}">
                <div class="fs-1 fw-bold" style="color:{{Auth::user()->profile->team->team_color}};">
                    {{Auth::user()->profile->team->team_jpname}}ファンの{{Auth::user()->profile->nickname}}
                </div>
            </a>
            <!--設定-->
            <div class="d-flex flex-row-reverse bd-highlight">
                
            </div>
        </div>
           
       
            
            
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                       最新トーク
                    </button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                      過去に作成したトーク
                    </button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                        {{Auth::user()->profile->team->team_name}}に関するトークルーム
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    @foreach ($talks as $talk)
                        <a class="h2" href="/talks/{{$talk->id}}">{{$talk->title}}</a><br></br>
                    @endforeach
                    <a href="">もっと見る</a>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @foreach ($talks as $talk)
                                   
                        <a class="h2" href="/talks/{{$talk->user->id}}">{{$talk->user->title}}</a><br></br>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    @foreach ($talks as $talk)
                        <a class="h2" href="/talks/{{$talk->id}}">{{$talk->title}}</a><br></br>
                    @endforeach
                    <a href="">もっと見る</a>
                </div>
            </div>
            <br>





            
            <div class="d-flex justify-content-between">
                <div>
                    <a class="fs-3 p-2 bd-highlight btn btn-primary" href="/talks/create" role="button">トークルームを作成する</a>
                </div>
            </div><br>
            <div class="fs-2 d-inline fw-bold">トークルームを検索</div>
                    
            <form class="mb-2 mt-4 text-center" method="GET" action="/talk/search" onSubmit="return ShowAlart()" name="talk">
                <input class="form-control my-2 mr-5" type="search" placeholder="トークルーム名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info my-2" type="submit">検索</button>
                    <button class="btn btn-secondary my-2 ml-5">
                        <a href="/home" class="text-white">クリア</a>
                    </button>
                </div>
            </form>
     
            
            
            
            
                        
                        
            <!--ニュース-->
         <div class="">
            <div class="fs-3 fw-bold">このチームに関連する ニュース</div>
            @foreach($articles as $article)
              
                <a class="fs-3 fw-bold" href="{{$article['url']}}">
                 {{$article['title']}}<br>
                </a>
                
                <img src="{{$article['urlToImage']}}" height="10%" width="15%"><br>
                
            @endforeach
        </div>
        
        
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
