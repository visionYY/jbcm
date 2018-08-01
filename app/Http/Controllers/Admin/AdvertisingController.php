<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisingController extends Controller
{

    //首页
    public function index(){
        $list = Advertising::paginate(20);
        return view('Admin.Advertising.index',compact('list',$list));
    }

    //展示(单条)
    public function show(){

    }

    //添加
    public function create(){

        return view('Admin.Advertising.create');
    }

    //执行添加
    public function store(){

    }

    //修改
    public function edit(){

    }

    //执行修改
    public function update(){

    }

    //删除
    public function destroy(){

    }
}
