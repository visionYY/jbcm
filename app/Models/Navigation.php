<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Navigation extends Model
{
    protected $table = 'navigation';

    protected $fillable = ['parent_id','n_name','sort'];

    //
    public static function getAll(){
        return self::get()->toArray();
    }

    //同时获取文章跟视频
    public static function getArticleVideo($nid,$num,$start=0){
        if($nid != 0){
            $where = 'WHERE t.nav_id='.$nid;
        }else{
            $where = '';
        }
        $res = DB::select('SELECT * FROM (SELECT id,nav_id,cg_id,title,cover,intro,publish_time,type,labels FROM hg_article UNION ALL 
                                                SELECT id,nav_id,cg_id,title,cover,intro,publish_time,type,labels FROM hg_video ) t 
                                               '.$where.' ORDER BY t.publish_time DESC LIMIT '.$start.','.$num);
        return $res;
    }
}
