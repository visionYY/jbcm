@extends('layouts.university')
@section('title','快速登陆')
@section('content')
 	@include('layouts.admin_error')
	<form action="" method="post">
		手机号：<input type="text" name="mobile"><br>
		验证码：<input type="text" name="yzm">
		<a href="javascript:;" class="sendCode">发送验证码</a>
		来源：<input type="text" name="source" value="{{$source}}">
		{{ csrf_field() }}
		<button >快速登陆</button>
	</form>
 	<a href="{{url('university/login?source='.$source)}}">密码登陆</a>
 	<script type="text/javascript">
 		$('.sendCode').click(function(){
 			var mobile = $('[name=mobile]').val();
 			$.ajax({
 				url:"{{url('university/getCode')}}",
 				data:{mobile:mobile},
 				type:'GET',
 				dataType:'json',
 				success:function(d){
 					console.log(d);
 				}

 			})
 		});
 	</script>
@stop