<?php

namespace App\Http\Controllers\University;

use App\Http\Resources\view;
use App\Models\Advertising;
use App\Models\DX\ApplyJbp;
use App\Models\DX\Comment;
use App\Models\DX\Course;
use App\Models\DX\Discussion;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index(){
        $adver = Advertising::getAdver(8,3);
        $discussion = Discussion::orderBy('created_at','desc')->first();
        $comment = Comment::where('discussion_id',$discussion->id)->first();
        if ($comment){
            $user = User::find($comment->user_id);
            $comment->user_name = $user->nickname;
            $comment->user_pic = $user->head_pic;
        }
        $course['boutique'] = Course::getIfy(2,3);
        $course['business'] = Course::getIfy(3,3);
//        dd($adver);
        return view('University.Index.index',compact('adver','discussion','course','comment'));
    }

    //嘉宾派
    public function jbp(){

        return view('University.Index.jbp');
    }

    //嘉宾派报名提交
    public function jbp_apply(Request $request){
        if($request->all()){

            $verif = array('name'=>'required',
                'sex'=>'required',
                'birthday'=>'required',
                'address'=>'required',
                'venture_years'=>'required|numeric',
                'identity'=>'required',
                'mobile'=>'required|numeric',
                'weixin'=>'required',
                'email'=>'required',
                'graduate_scholl'=>'required',
                'education_background'=>'required',
                'company'=>'required',
                'position'=>'required',
                'establish'=>'required',
                'staff_number'=>'required',
                'company_address'=>'required',
                'financing_phases'=>'required',
                'income'=>'required',
                'market_value'=>'required',
                'investor'=>'required',
                'operation_state'=>'required',
                'expectation'=>'required',
                'interest_jbp'=>'required',
                'interest_in'=>'required',
                'pay_attention'=>'required',
                'referrer'=>'required',
                'referrer_mobile'=>'required');
            $credentials = $this->validate($request,$verif);
            $credentials['identity'] = implode(';',$credentials['identity']);
            if ($request->idqt){
                $credentials['identity'] .= '：'.$request->idqt;
            }
            $credentials['expectation'] = implode(';',$credentials['expectation']);
            if($request->exqt){
                $credentials['expectation'] .= '：'.$request->exqt;
            }
            $credentials['pay_attention'] = implode('；',$credentials['pay_attention']);
            if ($request->paqt){
                $credentials['pay_attention'] .= '：'.$request->paqt;
            }
//            dd($credentials );
            if (ApplyJbp::create($credentials)){
                return redirect('university/jbp_success');
            }else{
                return back()->with('hint','当前系统繁忙，请稍后再试');
            }
        }
        return view('University.Index.jbp_apply');
    }

    public function jbp_success(){

        return view('University.Index.jbp_success');
    }

    //国际课程
    public function gjkc(){

        return view('University.Index.gjkc');
    }

    //国际课程报名
    public function gjkc_apply(Request $request){
        if ($request->all()){
            dd($request->all());
        }
        return view('University.Index.gjkc_apply');
    }

    public function gjkc_success(){

        return view('University.Index.gjkc_success');
    }

    //课程列表
    public function courseCategory($cgid){
        $courses = Course::getIfy(1,10);
//        dd($course);
        return view('University.Index.courseCategory',compact('courses'));
    }
}
