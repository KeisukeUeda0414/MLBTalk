<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
 
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', 'UserController@home')->name('home');
    // user詳細へ
    Route::get('/users/{user}', 'UserController@show');
    
    //TalkController
    Route::get('/talks/create', 'TalkController@create');
    Route::get('/talks/{talk}', 'TalkController@show');
    Route::post('/talks', 'TalkController@store');
    Route::delete('/talks/{talk}', 'TalkController@delete');
    
    //トークルーム検索
    Route::get('/talk/search', 'TalkController@search');
    Route::get('/talk/talkroom/{talk}', 'TalkController@show');
    
    // MessegeController
    Route::post('/messages/{talk}', 'MessageController@store');
    
    Route::get('/talks/{talk}/messages/{message}', 'MessageController@show');
    Route::delete('/talks/{talk}/messages/{message}', 'MessageController@delete');
    
    // 返信
    Route::get('/talks/{talk}/messages/{message}/reply', 'ReplyController@create');
    
    Route::get('/talks/{talk}/messages/{message}/replies/{reply}', 'ReplyController@show');
    Route::post('/messages/{talk}/{message}/reply', 'ReplyController@store');
    Route::delete('/talks/{talk}/messages/{message}/replies/{reply}', 'ReplyController@delete');
    
    //いいね
    Route::post('posts/{post}/favorites', 'LikeController@store')->name('favorites');
    Route::post('posts/{post}/unfavorites', 'LikeController@destroy')->name('unfavorites');
   
    
    
    // profile設定画面へ
    Route::get('/profile/setting', 'ProfileController@index');
    
    // profile登録
    // Route::post('/profile/set', 'ProfileController@store');
    Route::post('/profile/store/change', 'ProfileController@change');
    Route::post('/profile/store/store', 'ProfileController@store');

//test
    //画像保存
    Route::post('/image', 'PostsController@create');
    // メッセージ削除「
    Route::delete('/talkroom/message/{message}', 'MessageController@delete');
    
});