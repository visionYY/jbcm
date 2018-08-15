@extends('layouts.home')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Home/css/program.css')}}">
<link rel="stylesheet" href="{{asset('Home/css/program_1.css')}}">
<link rel="stylesheet" href="{{asset('Home/css/aboutUs.css')}}">
    <div class="wrapper">
        @include('layouts._header')
        <div class="main1 clearfix">
            <div class="main">
                <div class="main-left">
                    <ul class="left-list">
                        @foreach($data['towNav'] as $towNav)
                        <li class="{{$towNav->id == $data['secId'] ? 'active seled' : ''}}">
                            <a href="#ios_{{$towNav->id}}" data-toggle="tab">{{$towNav->n_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        @foreach($data['towNav'] as $towNav)
                        <div class="tab-pane fade {{$towNav->id == $data['secId'] ? 'in active' : ''}}" id="ios_{{$towNav->id}}">
                            <div class="main-right">
                                <p class="text-company-profile"><b>{{$towNav->n_name}}</b></p>
                                <div class="Company-profile">
                                    @if($towNav->art)
                                        {!!$towNav->art[0]['content']!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts._footer')
    <script type="text/javascript">
        $('.left-list li').on('click',function(){
            $(this).addClass("seled").siblings().removeClass("seled");
        });
    </script>
@stop