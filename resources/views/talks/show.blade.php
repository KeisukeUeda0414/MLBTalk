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
        
       
          
         <!--トークルームを削除（トーク作成者のみ表示）-->
        @if($talk->user->id===Auth::id())
            <div class="d-flex flex-row justify-content-center">
                <!--ルームタイトル-->
                <div class="h1 text-center sticky-top">
                    {{$talk->title}}<p></p>
                </div> 
                
            </div> 
                
                <div class="text-end">
                    <form action="/talks/{{ $talk->id }}" id="form_{{ $talk->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')<!-- Button trigger modal -->
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
        
        @else
            <!--ルームタイトル-->
            <h1 class="text-center sticky-top">
                {{$talk->title}}<p></p>
            </h1>   
        @endif
        
        
      
        <!--メッセージ-->
        @foreach($talk->messages as $message)
            @if($message->user->id===Auth::id())
            <!--自分-->
                <!--アイコン-->
                
                <div class="d-flex justify-content-end">
                    <div class=""><img class="rounded-circle" src="{{$user->profile->icon}}"></div>
                    
                    <div class="flex-column">
                        <!--メッセージ投稿者表示-->
                        <div class="">
                            <a href="/users/{{$message->user->id}}">{{$message->user->profile->team->team_name}}ファンの{{$message->user->profile->nickname}}</a>
                        </div>
                        <!--投稿時間-->
                        <div class="">{{$message->created_at}}</div>
                         <!--メッセージ-->
                             <a class="fs-1" href='/talks/{{$talk->id}}/messages/{{$message->id}}'>{{$message->body}}</a>
                                 <!--いいね-->
                                <div class="">
                                    @if($message->likes()->where('user_id', Auth::id())->exists())
                                        <div class=>
                                            <form action="{{ route('unfavorites', $message) }}" method="POST">
                                            @csrf
                                                <input type="submit" value="&#xf004.{{ $message->likes()->count() }}" class="fas btn btn-danger">
                                            </form>
                                        </div>
                                    @else
                                        <div class="">
                                            <form action="{{ route('favorites', $message) }}" method="POST">
                                            @csrf
                                                <input type="submit" value="&#xf004.{{ $message->likes()->count() }}" class="fas btn btn-success">
                                            </form>
                                        </div>
                                    @endif
                                </div><br>
                                 <a class="fs-5 btn btn-lg btn-info text-white" href='/talks/{{$talk->id}}/messages/{{$message->id}}/reply'> 返信する</a><br>
                    
                        </div>

                       </div>
                </div>
               
                <br>
               <!--返信-->
                <div class="d-flex flex-column">
                    
                    @foreach($message->replies as $reply)
                   
                    <div class="d-flex flex-row justify-content-end">
                        <div class="">⇨<img class="rounded-circle" src="{{$reply->user->profile->icon}}"></div>
                        <div class="d-flex flex-column">
                            <div>
                                <a href="/users/{{$reply->user->id}}">{{$reply->user->profile->team->team_name}}ファンの{{$reply->user->profile->nickname}}</a>
                            </div>
                           <div>
                                @if($reply->user->id === Auth::id())
                                <br><a href="/talks/{{$talk->id}}/messages/{{$message->id}}/replies/{{$reply->id}}" class="fs-2">{{$reply->body}}</a><br>
                                @else
                                <div class="fs-4">{{$reply->body}}</div><br>
                                
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
            @else
            <!--自分以外-->
                <div class="d-flex">
                    <div class="text-start"><img class="rounded-circle" src="{{$message->user->profile->icon}}"></div>
                    
                    <div class="flex-column">
                        <!--メッセージ投稿者表示-->
                        <a href="/users/{{$message->user->id}}">{{$message->user->profile->team->team_name}}ファンの{{$message->user->profile->nickname}}</a>
                        <!--投稿時間-->
                        <div class="">{{$message->created_at}}</div>
                        <!--メッセージ-->
                        <div class="fs-2">{{$message->body}}</div>
                        <div  class="">
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
                            <br>
                        </div>
                        <a class="fs-5 btn btn-lg btn-info text-white" href='/talks/{{$talk->id}}/messages/{{$message->id}}/reply'> 返信する</a><br>
                    </div>
                </div>
                <!--返信-->
                <div  class="d-flex flex-column">
                    @foreach($message->replies as $reply)
                    <div class="d-flex flex-row">
                        <div class="">⇨<img class="rounded-circle" src="{{$reply->user->profile->icon}}"></div>
                        <div class="d-flex flex-column">
                            <div>
                                <a href="/users/{{$reply->user->id}}">{{$reply->user->profile->team->team_name}}ファンの{{$reply->user->profile->nickname}}</a>
                            </div>
                            <div>
                                @if($reply->user->id === Auth::id())
                                <br><a href="/talks/{{$talk->id}}/messages/{{$message->id}}/replies/{{$reply->id}}" class="fs-2">{{$reply->body}}</a><br>
                                @else
                                <div class="fs-4">{{$reply->body}}</div><br>
                                
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
            @endif
            
            
            
        
        <br></br>
        @endforeach
       
       
       
        <!--メッセージ入力＆送信-->
        <form action="/messages/{{$talk->id}}" onSubmit="return ShowAlart()" method="POST" name="message">
            @csrf
            <!--コメント入力-->
            <div class="form-floating">
                <textarea class="form-control fixed-bottom" id="floatingTextarea2" style="height: 100px" name="message[body]" placeholder="コメントを入力"></textarea>
                 
            </div>
            <div class="text-start">
            <!--送信ボタン-->
            <input  class="btn btn-success fixed-bottom btn-lg" type="submit" value="送信"/>
            </div>
            
        </form>
        
       <script>
            function ShowAlart() {
                if(document.message.elements['message[body]'].value == "") {
                    alert("メッセージを入力してください");
                    return false;
                }
                
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
@endsection