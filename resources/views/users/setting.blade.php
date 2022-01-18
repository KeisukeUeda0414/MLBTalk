@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    
    <body>
        <h1>ユーザー詳細設定</h1>
        
            @if($profile->where('user_id', Auth::id())->exists())
           
                <form name="profile" action="/profile/store/change" onSubmit="return ShowAlart()" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--ニックネーム入力-->
                    <div class="body_comment">
                        <div class="h2">ニックネーム</div>
                        <textarea class="comment_input" name="profile[nickname]" placeholder="ニックネームを入力"></textarea><br></br>
                    </div>
                    <!--自己紹介入力-->
                    <div class="body_comment">
                        <div class="h2">自己紹介</div>
                        <textarea class="comment_input" name="profile[introduction]" placeholder="自己紹介を入力"></textarea><br></br>
                    </div>
                    <!--お気に入りチーム入力-->
                    <div class="body_comment">
                        <!--セレクトボックス-->
                        <div class="h2">お気に入りチームを選択</div>
                        <select name="profile[team_id]">
                            <option value="">選択してください</option>
                            @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{$team->team_name}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    
                    <!--画像を選択、アップロード-->
                    <div class="h2">アイコン画像を選択</div>
                    <div class="image_store">
                        <!-- アップロードフォームの作成 -->
                        <input type="file" name="image">
                        {{ csrf_field() }}
                    </div><br>
                    
                    <!--送信ボタン-->
                    <input class="btn btn-primary btn-lg" type="submit" value="登録"/>
                </form>
                
            @else
                <form name="profile" action="/profile/store/store" onSubmit="return ShowAlart()" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="h2">ニックネーム</div>
                        <textarea class="comment_input" name="profile[nickname]" placeholder="ニックネームを入力"></textarea><br></br>
                    </div>
                    <!--自己紹介入力-->
                    <div class="body_comment">
                        <div class="h2">自己紹介</div>
                        <textarea class="comment_input" name="profile[introduction]" placeholder="自己紹介を入力"></textarea><br></br>
                    </div>
              
                    <!--お気に入りチーム入力-->
                    <div>
                        <!--セレクトボックス-->
                        <div class="h2">お気に入りチームを選択</div>
                        <select name="profile[team_id]">
                            <option value="">選択してください</option>
                            @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{$team->team_name}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <!--画像を選択、アップロード-->
                    <div class="h2">アイコン画像を選択</div>
                    <div class="image_store">
                        <!-- アップロードフォームの作成 -->
                        <input type="file" name="image">
                        {{ csrf_field() }}
                    </div>  
                    <br>
                    <!--送信ボタン-->
                    <input class="btn btn-primary btn-lg" type="submit" value="登録"/>
                        
                </form>
            @endif
        
         
        
        <script>
            function ShowAlart() {
                if(document.profile.elements['profile[nickname]'].value == "") {
                    alert("ニックネームを入力してください");
                    return false;
                }
                if(document.profile.elements['profile[introduction]'].value == "") {
                    alert("自己紹介を入力してください");
                    return false;
                }
                if(document.profile.elements['profile[team_id]'].value == "") {
                    alert("お気に入りチームを選択してください");
                    return false;
                }
            }
        </script>
    </body>
</html>

@endsection