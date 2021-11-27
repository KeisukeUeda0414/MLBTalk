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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/talkroom', 'MLBTalkController@talkroom')->middleware('auth');
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/talkroom', 'MLBTalkController@talkroom');
    Route::get('/user_setting', 'User_settingController@user_setting');
    Route::post('/posts', 'MLBTalkController@store');
    Route::post('/posts_user_setting', 'User_settingontroller@store');
    // コメントリンクから削除確認画面へ
    Route::delete('/delete_confirm', 'MLBTalkController@delete');
});