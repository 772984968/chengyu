<?php
//用户登陆
$api->post('login','UserController@login')->name('user.login');
//权限验证
$api->group(['middleware' => 'auth:api'], function ($api) {
    //用户首页
    $api->get('index','UserController@index');
    //用户登出
    $api->get('logout','UserController@logout');
    //刷新令牌
    $api->get('refresh','UserController@refresh');

});
