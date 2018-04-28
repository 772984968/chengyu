<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends AuthController
{
    public function __construct()
    {
       return parent::__construct();
    }

    //用户首页
    public function index(){
    }
    //用户登陆
    public function  login(Request $request){
             return    parent::login($request);
                   }
    //用户退出
    public function logout(){
        return parent::logout();


    }
    //刷新令牌
    public function  refresh(){
        return parent::refresh();


    }
}
