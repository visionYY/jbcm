<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Services\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //列表
    public function index(){
        $list = Admin::pageList(20);
        return view('Admin.Admin.index',compact('list',$list));
    }

    public function create(){
        return view('Admin.Admin.create');
    }

    public function store(Request $request){
        $verif = array('username'=>'required|unique:admin',
            'password'=>'required',
            'password_confirmation'=>'required',
            'mobile'=>'required|numeric|unique:admin',
            'email'=>'required|unique:admin',
            'nickname'=>'required',
            'admin_pic'=>'required');
        $credentials = $this->validate($request,$verif);
        unset($credentials['password_confirmation']);
        $credentials['password'] = md5($credentials['password']);
        //上传头像
        $admin_pic = Upload::uploadOne('Admin',$credentials['admin_pic']);
        switch ($admin_pic){
            case 1:
                return back()->with('hint',config('hint.images_null'));
                break;
            case 2:
                return back()->with('hint',config('hint.images_type_error'));
                break;
            case 3:
                return back()->with('hint',config('hint.images_size_error'));
                break;
            default:
                $credentials['admin_pic'] = $admin_pic;
                break;
        }
//        dd($credentials);
        if (Admin::create($credentials)){
            return redirect('admin/admin')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }

    }
}
