<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeasonCourse extends Model
{
    //
    protected $table = 'c_season_course';

    protected $fillable = ['name', 'title','intro','cover','category'];
}
