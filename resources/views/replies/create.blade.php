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
        
        <!--メッセージ入力＆送信-->
        <form action="/messages/{{$talk->id}}/{{$message->id}}/reply" method="POST" onSubmit="return ShowAlart()" name="reply">
            @csrf
            <!--コメント入力-->
            <div class="form-floating">
                <textarea class="form-control fixed-bottom" id="floatingTextarea2" style="height: 100px" name="reply[body]" placeholder="返信"></textarea>
                 
            </div>
            <!--送信ボタン-->
            <input  class="btn btn-success fixed-bottom btn-lg" type="submit" value="送信"/>
           
            
        </form>
         
       <script>
            function ShowAlart() {
                if(document.reply.elements['reply[body]'].value == "") {
                    alert("メッセージを入力してください");
                    return false;
                }else if (document.reply.elements['reply[body]'].value.length >= 300) {
                    alert("一度に送信できるメッセージ300文字以内です");
                   return false;
                };
                
            }
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
@endsection