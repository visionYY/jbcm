@extends('layouts.home')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Home/css/program.css')}}">
<link rel="stylesheet" href="{{asset('Home/css/program_1.css')}}">
<div class="wrapper">
    <div class="main1 clearfix">
         @include('layouts._header')
        <div class="main_tab">
            <ul id="myTab" class="nav_bot nav-tabs">
                @foreach($data['towNav'] as $towNav)
                <li class="{{$towNav->id == $data['secId'] ? 'active' : ''}}">
                    <a href="#guest_{{$towNav->id}}" data-toggle="tab">
                        {{$towNav->n_name}}
                    </a>
                </li>
                @endforeach
                <!-- <li>
                    <a href="#documentary" data-toggle="tab">企业记录片</a>
                </li> -->
            </ul>
            <div id="myTabContent" class="tab-content">
                @foreach($data['towNav'] as $towNav)

                <div class="tab-pane fade {{$towNav->id == $data['secId'] ? 'in active' : ''}}" id="guest_{{$towNav->id}}">
                    @if($towNav->id == 9)
                    <div class="main">
                        <div class="main-left">
                            <div id="videoListID" class="videoList">
                                <table class="tableView">
                                    @foreach($towNav->video as $video)
                                    <ol>
                                        <h5 class="titletxt">
                                            <img src={{asset("Home/images/icon_shipin@2x.png")}} alt="">
                                            {{$video->title}}（{{$video->duration}}<!-- 分钟 -->）
                                            <a class="timeLabel">{{substr($video->publish_time,0,10)}}</a>
                                        </h5>
                                        <video class="videoFrame" controls>
                                            <source src="{{$video->address}}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                        </video>
                                    </ol>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="main-right">
                                <div class="rig-top">
                                    <h3 class="rig_tit"><i class="icons"></i>相关推荐</h3>
                                    <dl class="rig_dls">
                                        <a href="">
                                            <dt class="dls_img">
                                                <img src={{asset("Home/images/list3.png")}} alt="">
                                            </dt>
                                            <dd class="dls_titL">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                                        </a>
                                    </dl>
                                    <dl class="rig_dls">
                                        <a href="">
                                            <dt class="dls_img">
                                                <img src={{asset("Home/images/list3.png")}} alt="">
                                            </dt>
                                            <dd class="dls_titL">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                                        </a>
                                    </dl>
                                </div>
                        </div>
                    </div>
                    @else
                    <div class="box">
                        <div class="two-ban"><img src={{asset("Home/images/ban2.png")}} alt=""></div>   
                        @foreach($towNav->threeNav as $thrNav)
                        <div class="lists">
                            <div class="tit">
                                <p class="tit-txt"><span>{{$thrNav->n_name}} | <em>{{substr($thrNav->created_at,0,10)}}</em></span></p>
                                <a href="{{url('threeList/pid/'.$thrNav->parent_id.'/id/'.$thrNav->id)}}">查看更多</a>
                            </div>
                            <div class="cont">
                                @foreach($thrNav->article as $art)
                                <dl class="cont-dls">
                                    <a href="{{url('article/id/'.$art->id)}}">
                                        <dt><img src="{{asset($art->cover)}}" alt=""></dt>
                                        <dd>
                                            <p class="dls-tit">{{$art->title}}</p>
                                            <p class="dls-text">{{$art->cg_name}}</p>
                                            <p class="dls-time">{{$art->created_at}}</p>
                                        </dd>
                                    </a>
                                </dl>
                                @endforeach
                                <!-- <dl class="cont-dls">
                                    <a href="#">
                                        <dt><img src={{asset("Home/images/img1.png")}} alt=""></dt>
                                        <dd>
                                            <p class="dls-tit">地方似懂非懂发生的似懂非懂是否多福多寿发生的发生的的爽肤水地方时代发生的是东方时尚大方</p>
                                            <p class="dls-text">地方都舒服的沙发</p>
                                            <p class="dls-time">2018-7-30</p>
                                        </dd>
                                    </a>
                                </dl> -->
                                <!-- <dl class="cont-dls">
                                    <a href="#">
                                        <dt><img src={{asset("Home/images/img1.png")}} alt=""></dt>
                                        <dd>
                                            <p class="dls-tit">地方似懂非懂发生的似懂非懂是否多福多寿发生的发生的的爽肤水地方时代发生的是东方时尚大方</p>
                                            <p class="dls-text">地方都舒服的沙发</p>
                                            <p class="dls-time">2018-7-30</p>
                                        </dd>
                                    </a>
                                </dl> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                </div>

                @endforeach
                
            </div>
        </div>
    </div>
</div>

@include('layouts._footer')

@stop