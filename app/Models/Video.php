<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = ['title','address','duration','cover','cg_id','nav_id','labels','status','author','publish_time','intro'];

    //猜你喜欢
    public static function guessLike($labels,$limit=8){
        $labelArr = explode(',',$labels);
        $labwhere = '';
        foreach ($labelArr as &$v){
            if ($labwhere){
                $labwhere .= 'or instr(labels, "'.$v.'") > 0 ';
            }else{
                $labwhere .= 'instr(labels,"'.$v.'") > 0 ';
            }
        }
        $vid = DB::select('SELECT id,title,cover FROM hg_video WHERE '.$labwhere.' LIMIT '.$limit);
        return $vid;
    }

    //相关内容
    public static function search($keybord){
        $vid = DB::select('SELECT id,nav_id,title,cover,intro,publish_time FROM hg_video WHERE concat(title,intro) LIKE "%'.$keybord.'%"');
        return $vid;
    }

    //分类获取视频
    public static function getCategory($cgid,$num,$start=0){
        $vid = self::where('cg_id',$cgid)->orderBy('publish_time','desc')->limit($start,$num)->get();
        return $vid;
    }
}
