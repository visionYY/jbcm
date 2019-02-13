@extends('layouts.university')
@section('title','我的')
@section('content')
	<link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
	<link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('University/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('University/css/mine.css')}}">
	<style>
		body{
		background: rgba(242,242,242,1);
		}
	</style>
	<div class="wrapper">
		<div class="mine_top">
		  <dl>
		    <dt><img src="{{asset($user->head_pic)}}" alt=""></dt>
		    <dd>
		      <p class="mineName">{{$user->nickname}}</p>
		      <p class="mineScore" onclick="window.location.href='mine_score2.html'">{{$score->score}}嘉分<b></b></p>
		    </dd>
		  </dl>
		</div>
		<div class="mine_bot">
		  <ul>
		    <li class="lis" onclick="window.location.href='mine_view.html'">
		    	<span><img src="{{asset('University/images/icon_guandian@2x.png')}}" alt="">发表我的观点</span>
		    	<span><img src="{{asset('University/images/icon_dakai@2x.png')}}" alt=""></span>
		    </li>
		    <li class="lis">
		    	<span><img src="{{asset('University/images/icon_yigou@2x.png')}}" alt="">我的已购</span>
		    	<span><img src="{{asset('University/images/icon_dakai@2x.png')}}" alt=""></span>
		    </li>
		    <li class="lis" onclick="window.location.href='mine_collect.html'">
		    	<span><img src="{{asset('University/images/icon_shoucang@2x2.png')}}" alt="">我的收藏</span>
		    	<span><img src="{{asset('University/images/icon_dakai@2x.png')}}" alt=""></span>
		    </li>
		    <li class="lis">
		    	<span><img src="{{asset('University/images/icon_wentifankui@2x.png')}}" alt="">问题反馈</span>
		    	<span><img src="{{asset('University/images/icon_dakai@2x.png')}}" alt=""></span>
		    </li>
		    <li class="lis" onclick="window.location.href='{{url("university/my/setting")}}'">
		    	<span><img src="{{asset('University/images/icon_shezhi@2x.png')}}" alt="">设置</span>
		    	<span><img src="{{asset('University/images/icon_dakai@2x.png')}}" alt=""></span>
		    </li>
		    <a href="{{url('university/loginOut')}}">退出</a>
		  </ul>
		</div>
	</div>

	<footer class="foot">
		<a href="{{url('university/index')}}" class="Imgbox one"><img src="{{asset('University/images/icon_faxianhui@2x.png')}}" />发现</a>
		<a href="{{url('university/discussion/index')}}" class="Imgbox"><img src="{{asset('University/images/icon_meiriyiyi@2x.png')}}" />议一议</a>
		<a href="{{url('university/my/index')}}" class="Imgbox clo"><img src="{{asset('University/images/icon_wodelan@2x.png')}}" />我的</a>
	</footer>
	<script src="{{asset('University/js/swiper.min.js')}}"></script>
	<script>
	$(document).ready(function () {
	  
	})
	</script>
@stop

<!-- <img src="{{($user->head_pic)}}" width="50px;">
 	<a href="{{url('university/my/guesteScore/')}}">嘉分:{{$score->score}}</a>
 	<br>
 	<a href="">观点</a>
 	<a href="">已购</a>
 	<a href="">收藏</a>
 	<a href="">反馈</a>
 	<a href="{{url('university/my/setting')}}">设置</a>
 	<br>
	<a href="{{url('university/index')}}">发现</a>
	<a href="{{url('university/discussion/index')}}">每日一议</a>
	<a href="{{url('university/my/index')}}">我的</a>
	<a href="{{url('university/loginOut')}}">退出</a> -->