<?php

namespace App\Http\Controllers\University;

use App\Models\DX\ScoreRecord;
use App\Models\DX\GuesteScore;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:university');
    }

    //我的界面
    public function index(){
        $user = Auth::user();
        $score = GuesteScore::where('user_id',$user->id)->first();
        if (!$score){
            $score = GuesteScore::create(array('user_id'=>$user->id,'score'=>0));
        }
//        dd($user);
        return view('University.My.index',compact('user','score'));
    }

    //我的嘉分
    public function guesteScore(){
        $user = Auth::user();
        $score = GuesteScore::where('user_id',$user->id)->first();
        $record = ScoreRecord::where('gs_id',$score->id)->get();
        return view('University.My.guesteScore',compact('score','record'));
    }

    //关于嘉分
    public function aboutGuesteScore(){
        return view('University.My.aboutGuesteScore');
    }

    //设置
    public function setting(){
        return view('University.My.setting');
    }

    //账号管理
    public function accountManagement(){
        $user = Auth::user();
//        dd($user);
        return view('University.My.accountManagement',compact('user'));
    }

    //修改手机号
    public function editMobile(Request $request){
        if ($request->all()){
            $yzm = Session::get('yzm');
            $mobile = Session::get('mobile');
            if ($request->mobile != $mobile || $request->yzm != $yzm){
                return back()->with('hint',config('jbdx.yzm_error'));
            }
            $user = Auth::user();
            if ($user->update(['mobile'=>$request->mobile])){
                return back()->with('success',config('jbdx.update_success'));
            }else{
                return back()->with('hint',config('jbdx.update_error'));
            }
        }
        return view('University.My.editMobile');
    }

    //修改密码
    public function editPassWord(Request $request){
        if ($request->all()){
            $this->validate($request,['password'=>'required|confirmed|min:6']);
            $user = Auth::user();
            if ($user->update(['password'=>bcrypt($request->password)])){
                return back()->with('success',config('jbdx.update_success'));
            }else{
                return back()->with('hint',config('jbdx.update_error'));
            }
        }
        return view('University.My.editPassWord');
    }

    //关于我们
    public function aboutUs(){
        return view('University.My.aboutUs');
    }
}
