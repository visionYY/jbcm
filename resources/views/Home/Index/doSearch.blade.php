@extends('layouts.home')
@section('content')
<link rel="stylesheet" href={{asset("Home/css/index.css")}}>
<link rel="stylesheet" href="{{asset('Home/css/search.css')}}">
    <div class="wrapper">
        @include('layouts._header')
        <div class="main1 clearfix">
            <div class="main">
                <div class="main-left">
                    <form action="" id="dosform">
                    <p class="fond">  
                      <input type="text" name="keybord" value="{{$data['keybord']}}">
                      <input type="submit" value="搜索">
                    </p>
                    </form>
                    <div class="list">
                        @if($data['res'])
                            @foreach($data['res'] as $res)
                            <dl class="tab_list">
                                @if($res->type ==1)
                                <a href="{{url('article/id/'.$res->id)}}">
                                @else
                                <a href="{{url('video/id/'.$res->id)}}">
                                @endif
                                    <dt>
                                        <img src="{{asset($res->cover)}}" alt="">
                                    </dt>
                                    <dd>
                                        <h4 class="tab_tit">{{$res->title}}</h4>
                                        <p class="tab_con">{{$res->intro}}</p>
                                        <p class="tab_time">{{substr($res->publish_time,0,10)}}</p>
                                        <span>{{$res->n_name}}</span>
                                    </dd>
                                </a>
                            </dl>
                            @endforeach
                        @else
                        <p>没有找到相关内容</p>
                        @endif
                    </div>
                    
                </div>
                <div class="main-right">
                    <div class="rig-top">
                        <h3 class="rig_tit"><i class="icons"></i>编辑精选</h3>
                        @foreach($data['choi'] as $choi)
                        <dl class="rig_dls">
                            @if($choi->type == 1)
                            <a href="{{url('article/id/'.$choi->cho_id)}}">
                            @else
                            <a href="{{url('video/id/'.$choi->cho_id)}}">
                            @endif
                                <dt class="dls_img">
                                    <img src="{{asset($choi->cover)}}" alt="">
                                </dt>
                                <dd class="dls_tit">{{$choi->title}}</dd>
                            </a>
                        </dl>
                        @endforeach
                    </div>
                    
                </div>
            </div>
    </div>
    </div>
    @include('layouts._footer')
@stop