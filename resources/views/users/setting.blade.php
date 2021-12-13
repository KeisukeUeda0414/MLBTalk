@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/">
        <title>User</title>
        <!-- Fonts -->
        
    </head>
    
    <body>
        <h1>ユーザー詳細画面</h1>
        
        
       
　　　　<form action="/user_setting_finished" method="POST">
            @csrf
            <!--コメント入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[nickname]" placeholder="ニックネームを入力"></textarea>
            </div>
            <!--自己紹介入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="post[selfintroduction]" placeholder="自己紹介を入力"></textarea>
            </div>
            <!--お気に入りチーム入力-->
            <div class="body_comment">
                <!--セレクトボックス-->
                <p>お気に入りチームを選択</p>
               <select name="example">
                    @foreach ($prefectures as $talkroom)
                        <option value="サンプル1" name=post[team]>{{$talkroom}}</option>
                    @endforeach
                   
                 
                </select>
            </div>
           
              <div class="image_store">
                @section('content')
                        <form action="/image" method="post" enctype="multipart/form-data">
                        <!-- アップロードフォームの作成 -->
                        <input type="file" name="image">
                        {{ csrf_field() }}
                        <input type="submit" value="アップロード">
                    </form>
                @endsection
                </div>
      
            <!--送信ボタン-->
            <input class="send_comment" type="submit" value="送信"/>
        </form>
        
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection