<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    //首页
    public function index(){
        $list = Navigation::treeSelect();

        return view('Admin.Navigation.index',compact('list',$list));
    }

    //展示(单条)
    public function show(){

    }

    //添加
    public function create(){

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
