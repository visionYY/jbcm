<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = ['nav_id','cg_id','labels','cover','title','intro','author','publish_time','status','content'];

    //上一篇
    public static function prev($id,$nav_id){
        $article = DB::select("SELECT id, title FROM hg_article WHERE id = (SELECT max(id) FROM hg_article WHERE id < $id AND nav_id=$nav_id)");
        return $article;
    }

    //下一篇
    public static function next($id,$nav_id){
        $article = DB::select("SELECT id, title FROM hg_article WHERE id = (SELECT min(id) FROM hg_article WHERE id > $id AND nav_id=$nav_id)");
        return $article;
    }
}
