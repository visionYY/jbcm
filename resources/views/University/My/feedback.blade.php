@extends('layouts.university')
@section('title','问题反馈')
@section('content')
  <link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/mine_feedback.css')}}">
  <style type="text/css">
    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }
    .alert-dismissable, .alert-dismissible {
        padding-right: 35px;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    div {
        display: block;
    }
  </style>
  <div class="wrapper">
    <form method="post" action="">
      @csrf
    <textarea id="textarea" maxlength="500" oninput="content()" name="question" placeholder='在这里输入您遇到的问题~'>{{old('question')}}</textarea>
    <div class="line"></div>
    <div class="numbox">
      <p class="tel">您的联系方式（非必填）：</p>
      <p class="num"><input type="text" name="contact" value="{{old('contact')}}" placeholder='可以填写手机号或微信号'></p>
    </div>
    <button class="btn" type="submit" disabled="disabled">提交</button>
    </form>
    @include('layouts.admin_error')
  </div>
  <script type="text/javascript">
      function content(){
          var text=document.getElementById("textarea");
          //获取输入的文字的长度
          var textLength=text.value.length;
          // console.log(textLength);
          if(textLength!=0){
            $(".btn").attr("disabled",false);
            $('.btn').addClass('btn1')
          }else{
            $(".btn").attr("disabled",true);
            $('.btn').removeClass('btn1')
          }
      }

      $('.close').click(function(){
        $(this).parent().hide();
      })
  </script>
@stop