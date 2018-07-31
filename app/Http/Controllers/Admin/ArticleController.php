<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Models\Navigation;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class articleController extends Controller
{
    //首页
    public function index(){
        $list = Article::paginate(20);
        return view('Admin.Article.index',compact('list',$list));
    }

    //展示(单条)
    public function show($id){

    }

    //添加
    public function create(){
        $nav = Navigation::select('id','parent_id','n_name')->get()->toArray();
        $data['nav'] = Helper::_tree($nav);
        $data['cate'] = Category::select('id','cg_name')->get()->toArray();
        $data['label'] = Label::select('id','name')->get()->toArray();
        return view('Admin.Article.create',compact('data',$data));
    }

    //执行添加
    public function store(Request $request){

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
