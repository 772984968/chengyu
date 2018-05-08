<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Idiom extends  Model
{
    protected  $fillable=[
        'antonym','thesaurus','name','spell'
        ,'explain','derivation','pinyin'
        ,'first_leter','last_word','antonym','story','level_id'];
    public function level(){
        return $this->belongsTo(Level::class)->select('level','id');
    }
    //获取数量
    public static function  getCount($level){
        return  self::where('level_id',$level)->count();

    }
}
