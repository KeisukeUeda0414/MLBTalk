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
                <textarea class="comment_input" name="talk[title]" placeholder="トークルーム名を入力"></textarea>
            </div>
            <!--お気に入りチーム入力-->
            <div class="body_comment">
                <!--セレクトボックス-->
                <div class="fs-2">お気に入りチームを選択</div>
                <select name="talk[team_id]" required>
                    <option value="{{Auth::user()->profile->team->id}}" selected>{{Auth::user()->profile->team->team_name}}</option>
                    @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->team_name}}</option>
                    @endforeach
                </select>
            </div><br>
            
            <!--送信ボタン-->
            <input class="send_comment fs-3 p-2 bd-highlight btn btn-primary" type="submit" value="作成"/>
        </form>
        
        <script>
            function ShowAlart() {
                if(document.talk.elements['talk[title]'].value == "") {
                    alert("トークルーム名を入力してください");
                    return false;
                }
                else if (document.talk.elements['talk[title]'].value.length >= 15) {
                    alert("トークルームのタイトルは15文字以内です");
                   return false;
                };
                
            }
        </script>
    </body>
</html>

@endsection