<?php

namespace App\Http\Controllers\Api;
use App\Models\Idiom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use function MongoDB\BSON\toJSON;

class UserController extends AuthController
{
    public function __construct()
    {
       return parent::__construct();
    }


    //个人中心
    public function personal(){
        $user=auth('api')->user();
        return $this->arrayResponse('success','200',$user);
    }
    //用户首页
    public function index(){
        return $this->arrayResponse();
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
    //刷新数据
    public function idiom(Request $request){
       $rs=DB::table('idioms')->offset($request->offset)->limit($request->limit)->select('id','name')->get();
        $client = new Client();
      foreach ($rs as $vo){

          $res = $client->request('POST', 'http://api.jisuapi.com/chengyu/detail', [
              'form_params' => [
                  'appkey'=>'52cde2b299a25128',
                  'chengyu'=>$vo->name,
              ]
          ]);

          $rs=json_decode($body = $res->getBody());
          $antonym=[];
          $thesaurus=[];
          if (!empty($rs->result->antonym)){
              $antonym=$rs->result->antonym;
          }
          if (!empty($rs->result->thesaurus)){
              $thesaurus=$rs->result->thesaurus;
          }
          $res=DB::table('idioms')->where('id',$vo->id)->update(['antonym'=>implode(',',$antonym),'thesaurus'=>implode(',',$thesaurus)]);
      }
        }
}
