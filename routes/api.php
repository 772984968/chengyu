<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//短信类路由
Route::group(['prefix'=>'sms','namespace'=>'Api'],function(){
    //注册短信
    Route::post('/register','SmsController@register');
    //找回密码
    Route::get('find','SmsController@find');
    //找回修改密码
    Route::get('modify','SmsController@modify');
});