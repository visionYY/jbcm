<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Choiceness;
use App\Models\Label;
use App\Models\Navigation;
use App\Services\Helper;
use App\Services\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class articleController extends Controller
{
    //首页
    public function index(){
        $list = Article::orderBy('publish_time','desc')->paginate(20);
        foreach ($list as $art){
            $nav = Navigation::find($art->nav_id);
            $art->nav_name = $nav->n_name;
            $cate = Category::find($art->cg_id);
            $art->cg_name = $cate->cg_name;
            $cho = Choiceness::where('type',1)->where('cho_id',$art->id)->get()->toArray();
            if ($cho){
                $art->cho = $cho[0]['id'];
            }else{
                $art->cho = 0;
            }
        }
        return view('Admin.Article.index',compact('list',$list));
    }

    //展示(单条)
    public function show($id){

    }

    //添加
    public function create(){
        $nav = Navigation::getAll();
        $nav_tree = Helper::_tree_json($nav);
        $data['nav'] = Helper::getBottomLayer($nav_tree);
        $data['cate'] = Category::select('id','cg_name')->get()->toArray();
        $data['label'] = Label::select('id','name')->get()->toArray();
        return view('Admin.Article.create',compact('data',$data));
    }

    //执行添加
    public function store(Request $request){
//        dd($request->all());
        $verif = array('title'=>'required',
            'content'=>'required',
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
//        dd($credentials);die;
        //上传图片
        $pic_path = Upload::baseUpload($credentials['cover'],'upload/Article');
        if ($pic_path){
            $credentials['cover'] = $pic_path;
        }else{
            return back() -> with('hint',config('hint.upload_failure'));
        }
        if (Article::create($credentials)){
            return redirect('admin/article')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit($id){
        $nav = Navigation::getAll();
        $nav_tree = Helper::_tree_json($nav);
        $data['nav'] = Helper::getBottomLayer($nav_tree);
        $data['cate'] = Category::select('id','cg_name')->get()->toArray();
        $data['label'] = Label::select('id','name')->get()->toArray();
        $data['article'] = Article::find($id);
        return view('Admin.Article.edit',compact('data',$data));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('title'=>'required',
            'content'=>'required',
            'cg_id'=>'required|numeric',
            'nav_id'=>'required|numeric',
            'publish_time'=>'required',
            'intro'=>'required');
        $credentials = $this->validate($request,$verif);
        if ($request->post('labels')){
            $credentials['labels'] = implode(',',$request->post('labels'));
        }else{
            $credentials['labels'] = $request->post('old_labels');
        }
        if ($request->post('author')){
            $credentials['author'] = $request->post('author');
        }

        //图像上传
        if ($request->post('cover')){
            $pic_path = Upload::baseUpload($request->get('cover'),'upload/Article');
            if ($pic_path){
                $credentials['cover'] = $pic_path;
                @unlink(public_path($request->get('old_cover')));
            }else{
                return back() -> with('hint',config('hint.upload_failure'));
            }
        }else{
            $credentials['cover'] = $request->get('old_cover');
        }
        if(Article::find($id)->update($credentials)){
            return redirect('admin/article')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $Obj = Article::find($id);
        if (!$Obj){
            return back() -> with('hint',config('hint.data_exist'));
        }
        if (Article::destroy($id)){
            @unlink(public_path($Obj->cover));
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}
