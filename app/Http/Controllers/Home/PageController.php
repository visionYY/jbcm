<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //TOP40
    public function pageTop40(){
        $data['top40_pc'] = json_encode(config('hint.top40_pc'));
        $data['top40_yd'] = json_encode(config('hint.top40_yd'));

        return view('Home.Page.pageTop40',compact('data',$data));
    }

    //年会2018
    public function meeting_2018(){
        return view('Home.Page.meeting_2018');
    }

    //年会2018地图
    public function meeting_2018_map(){
        return view('Home.Page.meeting_2018_map');
    }
}
