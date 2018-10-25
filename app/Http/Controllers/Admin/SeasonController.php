<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeasonCourse;
use App\Models\SeasonSite;
use App\Services\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    //首页
    public function index(){
        $list = SeasonCourse::paginate(20);
//        dd($list);
        return view('Admin.Season.index',compact('list',$list));
    }

    //展示(单条)
    public function show(){

    }

    //添加
    public function create(){
    }

    //执行添加
    public function store(Request $request){
        $verif = array('name'=>'required',
            'title'=>'required',
            'intro'=>'required',
            'category'=>'required|numeric',
            'cover'=>'required');
        $credentials = $this->validate($request,$verif);
        $pic_path = Upload::uploadOne('Season',$credentials['cover']);
        if ($pic_path){
            $credentials['cover'] = $pic_path;
        }else{
            return back() -> with('hint',config('hint.upload_failure'));
        }
        if (SeasonCourse::create($credentials)){
            return back()->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit(){

    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('name'=>'required',
            'title'=>'required',
            'intro'=>'required',
            'category'=>'required|numeric',
            'oldcover'=>'required');
        $credentials = $this->validate($request,$verif);
        if ($request->file('cover')){
            $pic_path = Upload::uploadOne('Season',$request->file('cover'));
            if ($pic_path){
                $credentials['cover'] = $pic_path;
                @unlink(public_path($credentials['oldcover']));
            }else{
                return back() -> with('hint',config('hint.upload_failure'));
            }
        }else{
            $credentials['cover'] = $credentials['oldcover'];
        }
        unset($credentials['oldcover']);
        if (SeasonCourse::find($id)->update($credentials)){
            return back()->with('success',config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $season = SeasonCourse::find($id);
        $site = SeasonSite::where('sc_id',$season->id)->get()->toArray();
        if ($site){
            return back()->with('hint',config('hint.del_failure_exist'));
        }else{
            if (SeasonCourse::destroy($id)){
                unlink(public_path($season->cover));
                return back() -> with('success',config('hint.del_success'));
            }else{
                return back() -> with('hint',config('hint.del_failure'));
            }
        }
    }
}
