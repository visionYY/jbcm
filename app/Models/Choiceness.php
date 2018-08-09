<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choiceness extends Model
{
    protected $table = 'choiceness';

    protected $fillable = ['type', 'cho_id'];
}
