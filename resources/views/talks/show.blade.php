@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
       <!--ルームタイトル-->
        <h1 class="text-center sticky-top">
            {{$talk->title}}<p></p>
        </h1>   
            
        <!--トークルームを削除-->
        <div class="text-end">
                <form action="/talks/{{ $talk->id }}" id="form_{{ $talk->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    
                    
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        トークルームを削除
                    </button>
        
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    本当に削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn btn-primary">削除する</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
        </div>    
        
        
        <!--メッセージ-->
        @foreach($messages as $message)
            
            <a class="fs-2" href='/messages/{{$message->id}}'>{{$message->body}}</a>
            
            <!--メッセージ投稿者表示-->
            {{ $message->user->profile->nickname}}
            
            
            <!--いいね-->
            @if($message->likes()->where('user_id', Auth::id())->exists())
                <div class="col-md-3">
                    <form action="{{ route('unfavorites', $message) }}" method="POST">
                    @csrf
                        <input type="submit" value="&#xf004.{{ $message->likes()->count() }}" class="fas btn btn-danger">
                    </form>
                </div>
            @else
                <div class="col-md-3">
                    <form action="{{ route('favorites', $message) }}" method="POST">
                    @csrf
                        <input type="submit" value="&#xf004.{{ $message->likes()->count() }}" class="fas btn btn-success">
                    </form>
                </div>
            @endif
        
        <p></p>
        @endforeach
       
       
       
        <!--メッセージ入力＆送信-->
        <form action="/messages/{{$talk->id}}" method="POST">
            @csrf
            <!--コメント入力-->
            <div class="form-floating">
                <textarea class="form-control fixed-bottom" id="floatingTextarea2" style="height: 100px" name="message[body]" placeholder="コメントを入力"></textarea>
                 
            </div>
            <!--送信ボタン-->
            <input  class="btn btn-success fixed-bottom btn-lg" type="submit" value="送信"/>
           
            
        </form>
        
        
        
        
        
        
        
       
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
@endsection