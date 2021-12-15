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
        <h1>ユーザー詳細設定</h1>
        
        
       
　　　　<form action="/user_setting_finished" method="POST">
            @csrf
            <!--ニックネーム入力-->
            <div class="body_comment">
                <p>ニックネーム</p>
                <textarea class="comment_input" name="post[nickname]" placeholder="ニックネームを入力"></textarea><p></p>
            </div>
            <!--自己紹介入力-->
            <div class="body_comment">
                <p>自己紹介</p>
                <textarea class="comment_input" name="post[selfintroduction]" placeholder="自己紹介を入力"></textarea><p></p>
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
            
            
            
           
              
      
            <!--送信ボタン-->
            <input class="send_profile" type="submit" value="送信"/>
        </form>
        
        
        
        
        <script type="text/javascript" src="/js/talkroom.js"></script>
         
    </body>
</html>

@endsection