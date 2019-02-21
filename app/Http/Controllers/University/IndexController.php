<?php

namespace App\Http\Controllers\University;

use App\Models\Advertising;
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
        $user = User::find($comment->user_id);
        $comment->user_name = $user->nickname;
        $comment->user_pic = $user->head_pic;
        $course['boutique'] = Course::getIfy(2,3);
        $course['business'] = Course::getIfy(3,3);
//        dd($comment);
        return view('University.Index.index',compact('adver','discussion','course','comment'));
    }

    //课程列表
    public function courseCategory($cgid){
        $courses = Course::getIfy(1,10);
//        dd($course);
        return view('University.Index.courseCategory',compact('courses'));
    }
}
