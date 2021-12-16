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
    
    // Route::get('/talkroom', 'TalkController@talkroom');
    // メッセージの保存　
    Route::post('/store', 'MessageController@store');
    
    // コメントリンクから削除確認画面へ
    Route::get('/home', 'TalkController@talk')->name('home');
    Route::get('/user_setting', 'UserController@user_set');
    Route::get('/talkroom_making', 'TalkController@roommake');
    Route::get('/talkroom/{talk}', 'TalkController@show');
    
    Route::post('/talkroom_making_finished', 'TalkController@store_roomtitle');
    Route::post('/user_setting_finished', 'PostsController@create');
    //画像保存
    Route::post('/image', 'PostsController@create');
    
});
    //いいね
    Route::post('posts/{post}/favorites', 'LikeController@store')->name('favorites');
    Route::post('posts/{post}/unfavorites', 'LikeController@destroy')->name('unfavorites');
   
//   トークルーム検索
    Route::get('/talk/search', 'TalkController@search');
    Route::get('/talk/talkroom/{talk}', 'TalkController@show');

//test
    Route::get('/', 'MessageController@create');
    Route::delete('/talkroom/{talk}', 'TalkController@delete');
    Route::delete('/talkroom/message/{message}', 'MessageController@delete');
    