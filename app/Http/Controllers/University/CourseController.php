<?php

namespace App\Http\Controllers\University;

use App\Models\DX\Content;
use App\Models\DX\Course;
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
        }
//        dd($contents);
        return view('University.Course.show',compact('course','contents'));
    }

    public function buy($id){
        dd($id);
    }
}
