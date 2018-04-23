<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     *权限控制器.
     * @return void
     */
    public  function  __construct()
    {
        $this->middleware('auth.api')->except(['login']);
    }

    /**
     * 刷新token
     * @return
     */
    public function refresh(){
     return $this->respondWithToken(auth()->refresh());

    }
    /**
     * 获取令牌
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth('api')->factory()->getTTL()*60
        ]);

    }


}
