<?php

namespace App\Http\Controllers\Api;
use App\Models\Idiom;
use App\Models\Collection;
use Illuminate\Http\Request;
class CollectionController extends AuthController
{
    //收藏列表
    public function collection(){
        $user=auth('api')->user();
        $colletcs=Collection::where('user_id',$user->id)->with('level','idiom')->get();
        if ($colletcs)
        {
            return $this->arrayResponse('success','200',$colletcs);
        }
    }
    //添加收藏
    public function setCollection(Request $request){
        $data=$this->checkValidate($request,[
            'idiom_id'=>'required'
        ]);
        $re=Collection::where('user_id',auth('api')->id())->first();

        if (in_array($data['idiom_id'],explode(',',$re->idiom_ids))){
          $this->response()->error("该成语已在收藏列表中",402);
        }
        $re->idiom_ids=$re->idiom_ids.','.$data['idiom_id'];
        if ($re->save()){
         return   $this->arrayResponse();
        }else{
            return$this->response()->errorInternal('系统错误，请重试');
        };


    }

}
