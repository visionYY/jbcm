@extends('layouts.university')
@section('title','密码登陆')
@section('content')
 	@include('layouts.admin_error')
	<form action="" method="post">
		<input type="text" name="mobile">
		<input type="password" name="password">
		<input type="text" name="source" value="{{$source}}">
		{{ csrf_field() }}
		<button>密码登陆</button>
	</form>
 	<a href="{{url('university/quickLogin?source='.$source)}}">快速登陆</a>
@stop