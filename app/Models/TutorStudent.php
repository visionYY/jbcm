<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorStudent extends Model
{
    protected $table = 'tutor_student';

    protected $fillable = ['name','head_pic','position','intro','classic_quote','type'];
}
