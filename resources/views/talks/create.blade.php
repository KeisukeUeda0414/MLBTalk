@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!--トークルーム作成画面-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Talk</title>
        <!-- Fonts -->
        
    </head>
    
    <body>
        <h1>トークルーム作成画面</h1>
        <form action="/talks" method="POST" onSubmit="return ShowAlart()" name="talk">
            @csrf
            <!--トークルーム名入力-->
            <div class="body_comment">
                <textarea class="comment_input" name="talkroom[title]" placeholder="トークルーム名を入力"></textarea>
            </div>
            <!--送信ボタン-->
            <input class="send_comment fs-3 p-2 bd-highlight btn btn-primary" type="submit" value="作成"/>
        </form>
        
        <script>
            function ShowAlart() {
                if(document.talk.elements['talkroom[title]'].value == "") {
                    alert("トークルーム名を入力してください");
                    return false;
                }
                
            }
        </script>
    </body>
</html>

@endsection