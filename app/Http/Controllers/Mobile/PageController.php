<?php

namespace App\Http\Controllers\Mobile;

use App\Services\Helper;
use App\Services\JSSDK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //年会2018
    public function meeting_2018(){
        $signPackage = Helper::getJSSDK(url('mobile/page/meeting_2018'));
        return view('Mobile.Page.meeting_2018',compact('signPackage',$signPackage));
    }

    //年会2018地图
    public function meeting_2018_map(){
        return view('Mobile.Page.meeting_2018_map');
    }

    //test
    public function test(){
//        dd(config('hint.appId'),config('hint.appSecret'));
//        $jssdk = new JSSDK('wx87a51989fd90054d','f07cd74efc91a6d8e4ddb7dede68647e');
//        $signPackage = $jssdk->getSignPackage();
        $signPackage = Helper::getJSSDK(url('mobile/page/test'));
        return view('Mobile.Page.test',compact('signPackage',$signPackage));
    }
}
