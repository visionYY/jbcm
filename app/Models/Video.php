<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = ['title','duration','cover','cg_id','nav_id','labels','status','author','publish_time','intro'];
}
