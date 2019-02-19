@extends('layouts.university')
@section('title','评论')
@section('content')
  <link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/diacuss_reply1.css')}}">
  <div class="wrapper">
    <p class="top">回复<em>{{$comment['user']}}</em> <span  id="num">(0/500)</span>：</p>
    <textarea id="textarea" maxlength="500" oninput="content()" placeholder='在这里回复Peter'></textarea>
    <button class="btn" type="button" disabled="disabled">提交</button>
  </div>

  <script type="text/javascript">
      function content(){
          var text=document.getElementById("textarea");
          //文本框可以接收的长度
          var i=500;
          //获取输入的文字的长度
          var textLength=text.value.length;
          // console.log(i-textLength)
          if(i-textLength>=0){
              var divcontent=document.getElementById("num").innerText;
              document.getElementById("num").innerText="("+(i-textLength)+"/500)";
              $(".btn").attr("disabled",false);
              $('.btn').addClass('btn1')
          }
          if(i-textLength==500){
            // console.log(1)
            $(".btn").attr("disabled",true);
            $('.btn').removeClass('btn1')
          }
        }
        $('.btn').click(function(){
          var content = $('#textarea').val(),
              r_type = "{{$type}}",
              uid = "{{$user->id}}",
              cid = "{{$comment['id']}}",
              csrf = "{{csrf_token()}}";
          $.ajax({
            url:"{{url('university/discussion/putReply')}}",
            data:{uid:uid,cid:cid,content:content,_token:csrf,r_type:r_type},
            type:'POST',
            dataType:'json',
            success:function(d){
              if (d.code == '001') {
                $('.tz_con').text(d.content);
                // $('.cover1').fadeIn()
                console.log(d.msg);
              }else if(d.code == '002'){
                // $('.cover').fadeIn()  
                console.log(d.msg);

              }else{
                console.log(d.msg); 
              } 
            }
          });
        });
        
  </script>
@stop