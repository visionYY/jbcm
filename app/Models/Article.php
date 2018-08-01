<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = ['nav_id','cg_id','labels','cover','title','intro','author','publish_time','status','content'];
}
