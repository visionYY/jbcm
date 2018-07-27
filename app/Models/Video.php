<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = ['title','address','duration','cover','cg_id','nav_id','lables','status','author','publish_time','intro'];
}
