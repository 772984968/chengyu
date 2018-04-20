<?php

namespace App\Http\Controllers\Api;
use App\libraries\Adcommon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    //用户注册
    public  function register(Request $request){

/*
      if (!Adcommon::isMobile($request->input('username'))){
            return ['请输入正确的手机号'];
        }*/
      //  $rules=['users'=>'unique:users,username'];
        $rs=$this->validate($request,[
            'username' => 'bail|required|numeric',
        ]);
        return $this->validate($request,$this->ruler());
        die('s');
        $sms=new Sms();
        $sms->scenarios($request->method(),$request);


    }
    public  function  find(){

    }
    public  function modify(){

    }
    //验证规则
    public  function ruler($ruler=[]){
        $rulers=[
            'users' => 'bail|required|numeric',
        ];
        return empty($ruler)?$rulers:array_merge($ruler,$rulers);
    }
}
