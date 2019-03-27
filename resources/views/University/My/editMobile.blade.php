@extends('layouts.university')
@section('title','修改手机号')
@section('content')
 	<link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
	<link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('University/css/loginAmend.css')}}">

 	<div class="wrapper">
	    <div class="line"></div>
	    <form action="" method="post">
	    <div class="form">
	      <p class="pas">新手机号：&nbsp;<input type="tel" name="mobile" id="user" placeholder="请输入手机号" value="{{old('mobile')}}"><span></span></p>
	      <p class="pas">验证码：&nbsp;<input type="number" name="yzm" placeholder="请输入验证码" id="yz" value="{{old('yzm')}}"><input type="button" id="btn" value="获取验证码"   /></p>
	      <!-- <button id="btn">免费获取验证码</button> -->
	      {{ csrf_field() }}
	      <button class="btn" type="submit" disabled="disabled">提交</button>
	    </div>
	</form>
	    <p class="no">请填写正确的手机号！</p>
	    <p class="yes">验证码已发送！</p>
	</div>
 	@include('layouts.u_hint')
 	<script type="text/javascript">
		var phone = /^1[34578]\d{9}$/;
		//获取验证码
 		$('#btn').click(function(){
 			var userV = $("#user").val();
		    if(phone.test(userV)){
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
		    }else{
		      	$(".no").css("display","block");
			    setTimeout(function(){//定时器 
			        $(".no").css("display","none");
			    },2000);
		    }
 		});
 		
 		//获取验证码倒计时
	    var countdown=60;
	    function settime(val) {
	        if (countdown == 0) {
	            val.attr("");
	            val.val('免费获取验证码');
	            countdown = 60;
	            $(".yes").css("display","block");
			      setTimeout(function(){//定时器 
			        $(".yes").css("display","none");
			    },2000);
	        } else {
	            val.attr("disabled");
	            val.val("重新发送(" + countdown + ")");
	            countdown--;
	            setTimeout(function() {
	                settime(val)
	            },1000)
	        }
	    }
		
		//button禁用可用
		function content(){
		    var user = $("#user").val().trim();
		    var userlen = user.length;
		    var yz = $("#yz").val().trim();
		    var yzlen = yz.length;

		    if(userlen&&yzlen!=0){
		      $(".btn").attr("disabled",false);
		      $('.btn').addClass('btn1')
		    }else{
		      $(".btn").attr("disabled",true);
		      $('.btn').removeClass('btn1')
		    }
		}
	  	user.onkeyup = function(){
	    	content();
	  	}
		yz.onkeyup = function(){
		    content()
		}
  
		$('form').submit(function(){
			var userV = $("#user").val();
		    if(phone.test(userV)){
		    	return true;
		    }else{
		    	$(".no").css("display","block");
			    setTimeout(function(){//定时器 
			        $(".no").css("display","none");
			    },2000);
			    return false;
		    }
		})
	</script>
@stop

<!-- <form action="" method="post">
 		手机号：<input type="" name="mobile"> 
 		验证码：<input type="" name="yzm">
 		<a href="javascript:;" class="sendCode">发送验证码</a>
 		{{ csrf_field() }}
 		<input type="submit" name="" value="确认">
 	</form> -->