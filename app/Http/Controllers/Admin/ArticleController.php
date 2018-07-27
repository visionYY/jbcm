<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class articleController extends Controller
{
    //首页
    public function index(){
        $list = Article::where('type',2)->paginate(20);
        return view('Admin.Article.index',compact('list',$list));
    }

    //展示(单条)
    public function show($id){

    }

    //添加
    public function create($type){
        dd($type);
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
