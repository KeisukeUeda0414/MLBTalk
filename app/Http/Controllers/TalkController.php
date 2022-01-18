<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Reply;
use App\Message;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TalkController extends Controller
{
    
    
    //トーク作成画面への遷移
    public function create(Talk $talk)
    {
        return view('talks.create')->with(['talkrooms' => $talk->get()]);
    }
    
    //トークルームへ遷移
    public function show(Request $request, Talk $talk,User $user)
    {   
        return view('talks.show')->with(['talk' => $talk,'user' => Auth::user()]);
    }
    
   
    
    public function store(Request $request, Talk $talk_title)
    {
        $input = $request['talkroom'];
        $input += ['user_id' => $request->user()->id]; 
        $talk_title->fill($input)->save();
        return redirect('/home');
    }
    
    public function delete(Talk $talk)
    {
        $talk->delete();
        return redirect('/home');
    }
    
    
 
    public function search(Request $request, Talk $talk)
    {   
        // ユーザー一覧をページネートで取得
        $Talks = Talk::paginate(20);
        
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Talk::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search !== null) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："大谷 エンゼルス" → ["大谷", "エンゼルス"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }// 上記で取得した$queryをページネートにし、変数$usersに代入
            $talks = $query->paginate(20);
            
        }

        // ビューにusersとsearchを変数として渡す
        return view('result')
            ->with([
                'talks' => $talks,
                'search' => $search,
                'talkrooms' => $talk->get(),
            ]);
    }


}
