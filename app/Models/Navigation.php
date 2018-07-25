<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';

    protected $fillable = ['parent_id','n_name','sort','status'];

    //按树形查询
    public static function treeSelect(){
        $list = self::select('parent_id','n_name','sort','status','created_at')->where('parent_id',0)->get()->toArray();
        dd($list);
    }
}
