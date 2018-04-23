<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends AuthController
{

    //用户首页
    public function index(){
        die('s');
response()->json(['index']);
    }
    //用户登陆
    public function  login(Request $request){
        $credentials = request(['email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            die('s');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
           }
    //用户退出
    public function logout(){
        response()->json(['logout']);

    }
}
