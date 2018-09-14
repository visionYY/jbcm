<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //年会2018
    public function meeting_2018(){
        return view('Mobile.Page.meeting_2018');
    }

    //年会2018地图
    public function meeting_2018_map(){
        return view('Mobile.Page.meeting_2018_map');
    }
}
