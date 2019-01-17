@extends('layouts.university')
@section('title','我的')
@section('content')
 	@include('layouts.admin_error')
 	<img src="{{($user->head_pic)}}" width="50px;">
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
	<a href="{{url('university/loginOut')}}">退出</a>
@stop