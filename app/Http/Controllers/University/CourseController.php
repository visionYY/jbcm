<?php

namespace App\Http\Controllers\University;

use App\Models\DX\Collect;
use App\Models\DX\Content;
use App\Models\DX\Course;
use App\Models\DX\LearningState;
use App\Models\DX\Order;
use App\Models\DX\Quiz;
use App\Models\DX\QuizAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CourseController extends Controller
{
    //
    public function show($id){
        $course = Course::find($id);
        $contents = Content::where('course_id',$id)->get();
        foreach ($contents as $k=>$content){
            if ($k==0){
                $course->oneId = $content->id;
                $course->oneType = $content->type;
                $course->oneVideo = $content->video;
                $course->oneAudio = $content->audio ;
                $course->oneContent = $content->content;
//                dd();
            }
            $quizs = Quiz::where('content_id',$content->id)->get();
            $content->quizCount = count($quizs);
            foreach ($quizs as $quiz){
                $quiz->answers = QuizAnswer::where('quiz_id',$quiz->id)->get();
            }
            $content->quizs = $quizs;
        }
        if (Auth::guard('university')->check()){
            $user = Auth::guard('university')->user();
            $order = Order::where('user_id',$user->id)->where('couser_id',$course->id)->where('status',1)->first();
            if ($order){
                $course->isBuy = 1;
            }else{
                $course->isBuy = 0;
            }
            foreach ($contents as $con){
                $learning = LearningState::where('user_id',$user->id)->where('content_id',$con->id)->first();
//                dd($learning);
                if ($learning){
                    $con->learning = $learning;
                }else{
                    $learn['user_id'] = $user->id;
                    $learn['content_id'] = $con->id;
                    $learn['learning_time'] = '00:00';
                    $con->learning = LearningState::create($learn);
                }
            }
            $collect = Collect::where('user_id',$user->id)->where('by_collect_id',$course->id)->where('type',1)->first();
            if ($collect){
                $course->coll_status = $collect->status;
            }else{
                $course->coll_status = 0;
            }
        }
//        dd($contents,$course);
//        dd(Auth::guard('university')->check());
        return view('University.Course.show',compact('course','contents'));
    }

    /*
     * 音频
     * */
    public function audio($id){
        $course = Course::find($id);
        $contents = Content::where('course_id',$id)->get();
        foreach ($contents as $k=>$content){
            if ($k==0){
                $course->oneId = $content->id;
                $course->oneType = $content->type;
                $course->oneVideo = $content->video;
                $course->oneAudio = $content->audio ;
                $course->oneContent = $content->content;
                $course->oneTime = $content->time;
            }
            $quizs = Quiz::where('content_id',$content->id)->get();
            $content->quizCount = count($quizs);
            foreach ($quizs as $quiz){
                $quiz->answers = QuizAnswer::where('quiz_id',$quiz->id)->get();
            }
            $content->quizs = $quizs;
        }
        if (Auth::guard('university')->check()){
            $user = Auth::guard('university')->user();
            $order = Order::where('user_id',$user->id)->where('couser_id',$course->id)->where('status',1)->first();
            if ($order){
                $course->isBuy = 1;
            }else{
                $course->isBuy = 0;
            }
            foreach ($contents as $con){
                $learning = LearningState::where('user_id',$user->id)->where('content_id',$con->id)->first();
                if ($learning){
                    $con->learning = $learning;
                }else{
                    $learn['user_id'] = $user->id;
                    $learn['content_id'] = $con->id;
                    $learn['learning_time'] = '00:00';
                    $con->learning = LearningState::create($learn);
                }
            }
            $collect = Collect::where('user_id',$user->id)->where('by_collect_id',$course->id)->where('type',1)->first();
            if ($collect){
                $course->coll_status = $collect->status;
            }else{
                $course->coll_status = 0;
            }
//            print_r($collect);
        }
//        dd(Auth::guard('university')->check());
//        dd($contents,$course);
        return view('University.Course.audio',compact('course','contents'));
    }

    public function buy($id){
        dd($id);
    }

    /*
     * 自测题修改
     * */
    public function quizForm(Request $request){
        $count = count($request->all()) - 2;
        if (!$request->learning_id){
            return response(['code'=>'001','msg'=>'缺少参数，登陆后再试']);
        }
        $learning = LearningState::find($request->learning_id);
        if ($learning->update(['quiz_state'=>$count])){
            return response(['code'=>'002','msg'=>'提交成功','data'=>$count]);
        }else{
            return response(['code'=>'003','msg'=>'提交失败，请稍后再试']);
        }

    }

    /*
     * 学习时间及状态保存
     * */
    public function learningPut(Request $request){
        $learning = LearningState::find($request->ls_id);
        if ($learning){
            if ($learning->update(['state'=>$request->state,'learning_time'=>$request->now_time])){
                return response(['code'=>'002','msg'=>'提交成功']);
            }else{
                return response(['code'=>'003','msg'=>'提交失败，请稍后再试']);
            }
        }else{
            return response(['code'=>'001','msg'=>'缺少参数，登陆后再试']);
        }
    }

    //课程收藏
    public function collect(Request $request){
        $user = Auth::guard('university')->user();
        if (!$user){
            return response(['code'=>'001','msg'=>'尚未登陆']);
        }
        //判断是否有收藏过
        $collect = Collect::where('user_id',$user->id)->where('by_collect_id',$request->cid)->where('type',1)->first();
        if ($collect){
            $data['status'] = $request->status;
            if ($collect->update($data)){
                return response(['code'=>'002','msg'=>'操作成功']);
            }else{
                return response(['code'=>'003','msg'=>'操作失败，稍后重试！']);
            }
        }else{
            $data['user_id'] = $user->id;
            $data['by_collect_id'] = $request->cid;
            $data['type'] = 1;
            $data['status'] = 1;
            if (Collect::create($data)){
                return response(['code'=>'002','msg'=>'操作成功']);
            }else{
                return response(['code'=>'003','msg'=>'操作失败，稍后重试！']);
            }
        }
    }
}
