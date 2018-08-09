<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Choiceness;
use App\Models\Label;
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
        foreach ($list as $art){
            $nav = Navigation::find($art->nav_id);
            $art->nav_name = $nav->n_name;
            $cate = Category::find($art->cg_id);
            $art->cg_name = $cate->cg_name;
            $cho = Choiceness::where('type',2)->where('cho_id',$art->id)->get()->toArray();
            if ($cho){
                $art->cho = $cho[0]['id'];
            }else{
                $art->cho = 0;
            }
        }
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
        $data['label'] = Label::select('id','name')->get()->toArray();
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
            'labels'=>'required',
            'cover'=>'required',
            'intro'=>'required');
        $credentials = $this->validate($request,$verif);
        $credentials['labels'] = implode(',',$credentials['labels']);
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
    public function edit($id){
        $data['video'] = Video::find($id)->toArray();
        $nav = Navigation::select('id','parent_id','n_name')->get()->toArray();
        $data['nav'] = Helper::_tree($nav);
        $data['cate'] = Category::select('id','cg_name')->get()->toArray();
        $data['label'] = Label::select('id','name')->get()->toArray();
//        dd($data);
        return view('Admin.Video.edit',compact('data',$data));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('title'=>'required',
            'address'=>'required',
            'duration'=>'required',
            'cg_id'=>'required|numeric',
            'nav_id'=>'required|numeric',
            'publish_time'=>'required',
            'labels'=>'required',
            'intro'=>'required');
        $credentials = $this->validate($request,$verif);
        $credentials['labels'] = implode(',',$credentials['labels']);
        if ($request->post('author')){
            $credentials['author'] = $request->post('author');
        }
//        dd($credentials);
        //图像上传
        if ($request->post('cover')){
            $pic_path = Upload::baseUpload($request->get('cover'),'upload/Video');
            if ($pic_path){
                $credentials['cover'] = $pic_path;
                @unlink(public_path($request->get('old_cover')));
            }else{
                return back() -> with('hint',config('hint.upload_failure'));
            }
        }else{
            $credentials['cover'] = $request->get('old_cover');
        }
        if(Video::find($id)->update($credentials)){
            return redirect('admin/video')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $videoObj = Video::find($id);
        if (!$videoObj){
            return back() -> with('hint',config('hint.data_exist'));
        }
        $video = $videoObj->toArray();
        if (Video::destroy($id)){
            unlink(public_path($video['cover']));
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}
