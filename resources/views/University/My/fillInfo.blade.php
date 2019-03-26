@extends('layouts.university')
@section('title','补充信息')
@section('content')
  <link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/login.css')}}">
<style>
  .ttt{
    margin-top:2.35rem;
  }
</style>
  <div class="wrapper wrapper1">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="imgbox">
        <input type="file" accept='image/*' id="img1" name="head_pic">
        <label class="head_photo" for="img1">
          <img src="{{asset($user->head_pic)}}" alt="" id="head_pic_img">
        </label>
    </div>
    <p class="inp"><input class="inpp" type="text" name="truename" value="{{$user->truename}}"></p>
    {{ csrf_field() }}
    <button class="subb">提交</button>
    </form>
    <div class="cover1">请正确填写您的真实姓名</div>
  </div>

  <script>
    $(document).ready(function () {
      $('#img1').change(function(){
        var imgurl = getObjectURL(this.files[0]);
        $('#head_pic_img').attr('src',imgurl);
        // alert($(this).val())
      })

       //图片预览
        function getObjectURL(file){
            var url = null;
            if (window.createObjectURL!=undefined) {  
              url = window.createObjectURL(file) ;  
             } else if (window.URL!=undefined) { // mozilla(firefox)  
              url = window.URL.createObjectURL(file) ;  
             } else if (window.webkitURL!=undefined) { // webkit or chrome  
              url = window.webkitURL.createObjectURL(file) ;  
             }  
             return url ;
        }
    })
    $('form').submit(function(){
      var pattern = /[A-Za-z0-9_\-\u4e00-\u9fa5]{2,10}$/;  //正规表达式对象
      if(pattern.test($('.inpp').val())){
        return true;
      }else{
        $(".cover1").css("display","block");
				setTimeout(function(){//定时器 
					$(".cover1").css("display","none");
				},3000);
        return false;
      }
      alert( pattern.test($('.inpp').val()) ); //输出是否符合要求，true符合，false不符合
    })
      
  </script>
@stop