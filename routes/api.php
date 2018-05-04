<?php
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace'=>'App\Http\Controllers\Api'],function($api){

        //用户管理
        $api->group(['prefix'=>'user'],function($api){
            require_once __DIR__.'/api/user.php';
        });
        //权限验证
        $api->group(['middleware' => 'auth:api'], function ($api) {
         });
    });
 });
