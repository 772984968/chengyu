<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends AuthController
{
    public function __construct()
    {
        parent::__construct();
    }
    //意见反馈
    public function feedback(Request $request){
       $data= $this->checkValidate($request,[
            'user_id'=>'required',
            'content'=>'required|min:8',
        ]);
        if (Feedback::create($data)){
            return $this->arrayResponse();
        }else{
            return $this->response()->errorInternal('系统错误，请稍后重试');
        };

    }

}
