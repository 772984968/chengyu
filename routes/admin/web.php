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


        //后台资源首页
        Route::get('/','IndexController@index')->name('index');
        //后台欢迎页
        Route::get('welcome','IndexController@welcome');
        //后台登陆
        Route::resource('login','LoginController');
         Route::get('test', function () {
         });
});