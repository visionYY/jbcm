<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choiceness extends Model
{
    protected $table = 'choiceness';

    protected $fillable = ['type', 'cho_id'];

    //获取当前精选前三条信息
    public static function getThere(){
        $choi = self::select('type','cho_id')->orderBy('id','desc')->limit(3)->get();
        foreach ($choi as $v){
            if ($v->type == 1){
                $res = Article::select('title','cover')->find($v->cho_id);
            }else{
                $res = Video::select('title','cover')->find($v->cho_id);
            }
            $v->title = $res->title;
            $v->cover = $res->cover;
        }
        return $choi;
    }
}
