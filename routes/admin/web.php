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

//

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

        //登陆逻辑
       require_once __DIR__.'/login.php';

        //后台资源首页
        Route::get('index','IndexController@index')->name('index');
        //后台欢迎页
        Route::get('welcome','IndexController@welcome');
        //等级管理
        Route::resource('level','LevelController');
        //意见反馈
        Route::resource('feedback','FeedbackController');
        //用户管理
        Route::resource('user','UserController');
        //成语管理
        Route::resource('idiom','IdiomController');



});