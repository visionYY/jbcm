<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Navigation;
use App\Models\Video;
use App\Services\Helper;
use App\Services\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //首页
    public function index(){
        $list = Video::paginate(20);
        return view('Admin.Video.index',compact('list',$list));
    }

    //展示(单条)
    public function show(){

    }

    //添加
    public function create(){
        $nav = Navigation::select('id','parent_id','n_name')->get()->toArray();
        $data['nav'] = Helper::_tree($nav);
        $data['cate'] = Category::select('id','cg_name')->get()->toArray();
        return view('Admin.Video.create',compact('data',$data));
    }

    //执行添加
    public function store(Request $request){
        $verif = array('title'=>'required',
            'address'=>'required',
            'duration'=>'required',
            'cg_id'=>'required|numeric',
            'nav_id'=>'required|numeric',
            'publish_time'=>'required',
            'cover'=>'required',
            'intro'=>'required');
        $credentials = $this->validate($request,$verif);
        if ($request->post('author')){
            $credentials['author'] = $request->post('author');
        }
        //上传图片
        $pic_path = Upload::baseUpload($credentials['cover'],'upload/Video');
        if ($pic_path){
            $credentials['cover'] = $pic_path;
        }else{
            return back() -> with('hint',config('hint.upload_failure'));
        }
        if (Video::create($credentials)){
            return redirect('admin/video')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
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
