@extends('layouts.university')
@section('title','发现')
@section('content')
 	@include('layouts.admin_error')
	<a href="{{url('university/index')}}">发现</a>
	<a href="{{url('university/discussion/index')}}">每日一议</a>
	<a href="{{url('university/my/index')}}">我的</a>
@stop