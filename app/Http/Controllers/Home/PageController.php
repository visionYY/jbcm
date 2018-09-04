<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function pageTop40(){
        $data['top40_pc'] = json_encode(config('hint.top40_pc'));
        $data['top40_yd'] = json_encode(config('hint.top40_yd'));

        return view('Home.Page.pageTop40',compact('data',$data));
    }
}
