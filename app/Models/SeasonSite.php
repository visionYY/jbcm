<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeasonSite extends Model
{
    //
    protected $table = 'c_season_site';

    protected $fillable = ['name', 'intro','cover'];
}
