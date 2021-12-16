<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Message;

class TalkController extends Controller
{
    //ホーム画面への遷移
    public function talk(Talk $talk)
    {
        return view('home')->with(['talkrooms' => $talk->get()]);
    }
    
    //トーク作成画面への遷移
    public function roommake(Talk $talk)
    {
       
        return view('talks.create')->with(['talkrooms' => $talk->get()]);
    }
    
    
    
    
    //トークルームへ遷移
    public function show(Talk $talk )
    {
        // return view('talks.show')->with(['talks' => $talk->getByTalk()]);
        
        return view('talks.show')->with(['talk' => $talk,'messages' => $talk->getByTalk()]);
        
        }
    
   
    
    public function store_roomtitle(Request $request, Talk $talk_title)
    {
        $input = $request['talkroom'];
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

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
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
