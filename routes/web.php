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
    
    Route::get('/home', 'HomeController@talk')->name('home');
    
    
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
    Route::get('/messages/{message}', 'MessageController@show');
    Route::delete('/messages/{message}', 'MessageController@delete');
});
    //いいね
    Route::post('posts/{post}/favorites', 'LikeController@store')->name('favorites');
    Route::post('posts/{post}/unfavorites', 'LikeController@destroy')->name('unfavorites');
   
    
    
    // profile設定画面へ
    Route::get('/profile/setting', 'ProfileController@index');
    
    // profile登録
    // Route::post('/profile/set', 'ProfileController@store');
    Route::post('/profile/set/exists', 'ProfileController@change');
    Route::post('/profile/set/unexists', 'ProfileController@store');

//test
    //画像保存
    Route::post('/image', 'PostsController@create');
    // メッセージ削除「
    Route::delete('/talkroom/message/{message}', 'MessageController@delete');
    