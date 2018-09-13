@extends('layouts.mobile')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Mobile/css/aboutUs.css')}}">
  <div data-role="page" id="pageone">
      @include('layouts.m_header')
      <div class="centera">
        <div class="adver">
          <img src="{{asset('Mobile/images/Screenshot - 2017-12-07 11.30.55.jpg')}}" alt="">
        </div>
        <div class="aboutCont">
          <h4 class="one-tit"><span>公司简介</span></h4>
          <h5 class="two-tit"><i>遍访天下公司 纪录时代商业</i></h5>
          <p class="conts">发生的范德萨发生的范德萨发顺丰的发生的范德萨发生的发生地方水电费水电费水电费是否收到是非得失发生的发生的发生的发生的方式地方</p>
          <p class="conts">奇虎360是（北京奇虎科技有限公司）的简称，由周鸿祎 于创立，主营360杀毒奇虎360是（北奇虎科技有限公司）的简称， 由周鸿祎于2005年9月创立，主营360杀毒</p>
          <h4 class="one-tit"><span>公司简介</span></h4>
          <h5 class="two-tit"><i>遍访天下公司 纪录时代商业</i></h5>
          <p class="conts">发生的范德萨发生的范德萨发顺丰的发生的范德萨发生的发生地方水电费水电费水电费是否收到是非得失发生的发生的发生的发生的方式地方</p>
          <p class="conts">奇虎360是（北京奇虎科技有限公司）的简称，由周鸿祎 于创立，主营360杀毒奇虎360是（北奇虎科技有限公司）的简称， 由周鸿祎于2005年9月创立，主营360杀毒</p>
        </div>
      </div>

  </div>
  <script src="{{asset('Mobile/js/jquery-1.10.1.min.js')}}"></script>
  <script src="{{asset('Mobile/js/swiper.min.js')}}"></script>
  <script src="{{asset('Mobile/js/iscroll.js')}}"></script>
  <script src="{{asset('Mobile/js/index.js')}}"></script>

  <script>
      $("#oranger li a").on("mouseover",function(){ //给li标签添加事件  
        var index=$(this).parent().index();  //获取当前li标签的个数  
        $(this).parent().parent().next().find(".box").hide().eq(index).show(); //返回上一层，在下面查找css名为box隐藏，然后选中的显示  
        $(this).addClass("hover").parent().siblings().children().removeClass("hover"); //a标签样式
      })
      $("#pagehide").click(function(){
        $("#myPanel").toggle()
      })
      
  </script>
@stop