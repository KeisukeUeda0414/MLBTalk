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
    
    Route::get('/talkroom', 'TalkController@talkroom');
    Route::post('/posts', 'TalkController@store');
    Route::post('/profile_setting_finished', 'ProfileController@store');
    // コメントリンクから削除確認画面へ
    // Route::delete('/delete_confirm', 'MLBTalkController@delete');
    Route::get('/home', 'TalkController@talk')->name('home');
    Route::get('/profile_setting', 'ProfileController@profile_set');
    Route::get('/talkroom_making', 'TalkController@roommake');
    Route::get('talkroom/{talkroom}', 'TalkController@talkroom');
    
    Route::post('/talkroom_making_finished', 'TalkController@store_roomtitle');
});