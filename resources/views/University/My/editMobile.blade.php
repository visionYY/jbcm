@extends('layouts.university')
@section('title','修改手机号')
@section('content')
 	@include('layouts.admin_error')
 	<form action="" method="post">
 		手机号：<input type="" name="mobile"> 
 		验证码：<input type="" name="yzm">
 		<a href="javascript:;" class="sendCode">发送验证码</a>
 		{{ csrf_field() }}
 		<input type="submit" name="" value="确认">
 	</form>

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