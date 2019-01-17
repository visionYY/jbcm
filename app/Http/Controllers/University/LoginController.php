<?php

namespace App\Http\Controllers\University;

use App\Models\Sms;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //密码登陆
    public function passwordLogin(Request $request){
        $source = $request->source;
        return view('University.Login.passwordLogin',compact('source'));
    }

    //执行密码登录
    public function doPasswordLogin(Request $request){
        $credentials = $this->validate($request,['mobile'=>'required','password'=>'required']);
//        dd($credentials);
        if (Auth::guard('university')->attempt($credentials)){
//            $user = Auth::guard('university')->user();
            return redirect('university/my/index')->with('success',config('jbdx.login_success'));
        }else{
            return back()->with('hint',config('hint.error'));
        }
    }

    //快速登陆
    public function quickLogin(Request $request){
        $source = $request->source;
        return view('University.Login.quickLogin',compact('source'));
    }

    //执行快速登陆
    public function doQuickLogin(Request $request){
        $yzm = Session::get('yzm');
        $mobile = Session::get('mobile');
        if ($request->mobile != $mobile || $request->yzm != $yzm){
            return back()->with('hint',config('jbdx.yzm_error'));
        }
        $users = User::where('mobile',$mobile)->get();
        if (!$users->toArray()){
            $info['username'] = $mobile;
            $info['nickname'] = $mobile;
            $info['mobile'] = $mobile;
            $user= User::create($info);
            if (!$user){
                return back()->with('hint',config('jbdx.register_error'));
            }
        }else{
            $user = $users[0];
        }
        Auth::guard('university')->login($user);
        //返回，从哪里了，返回到哪里去
        return redirect('university/my/index')->with('success',config('jbdx.login_success'));
    }

    //退出
    public function loginOut(){
        Auth::guard('university')->logout();
        return redirect('university/index')->with('success',config('hint.back'));
    }

    //注册
    public function register(){
        return view('University.Login.register');
    }

    //注册执行
    public function doregister(Request $request){
        dd($request->all());
    }

    //获取验证码
    public function getCode(Request $request){
        if (!$request->mobile){
            return response(array('code'=>'001','msg'=>'缺少参数：手机号'));
        }
        $yzm = rand(1000,9999);
        Session::put('mobile',$request->mobile,'180');
        Session::put('yzm',$yzm,'180');
        $res = Sms::send($request->mobile,'SMS_152880235',$yzm);
        if(!$res){
            return response(array('code'=>'002','msg'=>'发送失败，请重试'));
        }
        $data['mobile'] = $request->mobile;
        $data['yzm'] = $yzm;
        $data['res'] = $res;
        return response(array('code'=>'003','msg'=>'请求成功！','data'=>$data));
    }


}
