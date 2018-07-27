<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = ['nav_id','cg_id','lables','title','t_pic','t_video','tv_time','intro','author','publish_time','status','type','content'];
}
