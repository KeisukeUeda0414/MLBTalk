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
        
        <!--メッセージ-->
        <div class="fs-2">
            {{$reply->body}}
        </div>
        
  
                                    
        <!--トークルームを削除（トーク作成者のみ表示）-->
          <!--Modal -->
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
                                    
                                    
                                    <form action="/talks/{{$reply->message->talk->id}}/messages/{{ $reply->message->id }}/replies/{{$reply->id}}" id="form_{{ $reply->id }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">削除する</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            <div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    メッセージを削除
                </button>
                
            </div>
        <h1 class="text-center sticky-top">
       
         
        
        
        
        
        
        
        
       
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
@endsection