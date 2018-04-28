<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Elasticsearch\Common\Exceptions\Unauthorized401Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class AuthController extends Controller
{

    public  function  __construct()
    {
        if (!auth('api')->check()){

        }
           }


     //刷新token
    public function refresh(){
     return $this->respondWithToken(auth('api')->refresh());

    }

     // 获取令牌
     public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth('api')->factory()->getTTL()*60
        ]);

    }
    //登陆
    public function login(Request $request){

        $credentials=request(['username','password']);
        if (!$token=auth('api')->attempt($credentials)){
            return response()->json(['error'=>'用户名或密码不正确'],401);
        }

        return $this->respondWithToken($token);

    }

    //退出
    public function logout(){
                auth('api')->logout();
        return response()->json(['logout']);

    }

}
