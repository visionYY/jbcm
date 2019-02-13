<?php

namespace App\Http\Controllers\University;

use App\Models\Advertising;
use App\Models\DX\Course;
use App\Models\DX\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index(){
        $adver = Advertising::getAdver(8,3);
        $discu = Discussion::orderBy('created_at','desc')->first();
        $course['boutique'] = Course::getIfy(2,3);
        $course['business'] = Course::getIfy(3,3);
//        dd($course);
        return view('University.Index.index',compact('adver','discu','course'));
    }
}
