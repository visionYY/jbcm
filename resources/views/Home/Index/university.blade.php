@extends('layouts.home')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Home/css/program.css')}}">
<link rel="stylesheet" href="{{asset('Home/css/program_1.css')}}">
<div class="wrapper">
        @include('layouts._header')
    <div class="main1 clearfix">
        <div class="main_tab">
            <ul id="myTab" class="nav_bot nav-tabs">
                 @foreach($data['towNav'] as $towNav)
                <li class="{{$towNav->id == $data['secId'] ? 'active' : ''}}">
                    <a href="#guest_{{$towNav->id}}" data-toggle="tab">
                        {{$towNav->n_name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <div id="myTabContent" class="tab-content">
                 @foreach($data['towNav'] as $towNav)
                <div class="_guest tab-pane fade {{$towNav->id == $data['secId'] ? 'in active' : ''}}" id="guest_{{$towNav->id}}">
                    <div class="box">
                        <div class="two-ban"><img src="{{asset('Home/images/ban2.png')}}" alt=""></div>   
                        <div class="lists">
                            @foreach($towNav->threeNav as $thrNav)
                            <div class="tit">
                                <p class="tit-txt"><img src="{{asset('Home/images/icon_jiemu@2x.png')}}" alt=""><img>{{$thrNav->n_name}}</p>
                                <a href="{{url('threeList/pid/'.$thrNav->parent_id.'/id/'.$thrNav->id)}}"><p class="list-more">更多<img src="{{asset('Home/images/icon_gengduo@2x.png')}}" alt=""></p></a>
                            </div>
                            <div class="cont">
                                @foreach($thrNav->article as $art)
                                <dl class="cont-dls">
                                    <a href="{{url('article/id/'.$art->id)}}">
                                        <dt><img src="{{asset($art->cover)}}" alt=""></dt>
                                        <dd>
                                            <p class="dls-tit">{{$art->title}}</p>
                                            <p class="dls-text">{{$art->cg_name}}</p>
                                            <p class="dls-time">{{substr($art->publish_time,0,10)}}</p>
                                        </dd>
                                    </a>
                                </dl>
                                @endforeach
                            </div>
                            @endforeach   
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('layouts._footer')
@stop