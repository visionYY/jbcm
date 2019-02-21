<?php

namespace App\Http\Controllers\University;

use App\Models\DX\Content;
use App\Models\DX\Course;
use App\Models\DX\Quiz;
use App\Models\DX\QuizAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //
    public function show($id){
        $course = Course::find($id);
        $contents = Content::where('course_id',$id)->get();
        foreach ($contents as $content){
            $quizs = Quiz::where('content_id',$content->id)->get();
            foreach ($quizs as $quiz){
                $quiz->answers = QuizAnswer::where('quiz_id',$quiz->id)->get();
            }
            $content->quizs = $quiz;
        }
//        dd($contents);
        return view('University.Course.show',compact('course','contents'));
    }
}
