<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorStudent extends Model
{
    protected $table = 'tutor_student';

    protected $fillable = ['name','head_pic','position','intro','classic_quote','type','show_index'];

    //首页展示
    public static function getIndexShow(){
        return self::where('show_index',1)->orderBy('created_at','DESC')->limit(config('hint.index_show_tust'))->get();
    }
}
