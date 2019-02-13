@extends('layouts.university')
@section('title','议题详情')
@section('content')
  <link rel="stylesheet" href="{{asset('University/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/discuss_detail.css')}}">
  <div class="wrapper">
    <div class="discuss">
      <p class="dis_tit">{{$discussion->title}}</p>
      <div class="fun">
        <p class="funl">出题人：{{$discussion->author}}</p>
        <p class="funr">
          <a href="#" class="Imgbox">
            <img src="{{asset('University/images/icon_haibao.png')}}" />海报</a>
          <a href="#" class="Imgbox">
            <img src="{{asset('University/images/icon_fenxiang2@2x.png')}}" />分享</a>
        </p>
      </div>
      <div class="dis_con">{!!$discussion->content!!}</div>
      <!-- <p class="dis_con">
        12月12日晚，证监会对外发布消息称，由于三只松鼠相关 事项需进一步核查，取消对其发行申报文件的审核。这是新一届 发审委成立以来，首家IPO申请被取消审核的企业。那么到底是 谁拽住了三只松鼠的尾巴，导致其其其其IPO...
      </p>
      <video controls>
        <source src="somevideo.webm" type="video/webm">
        <source src="somevideo.mp4" type="video/mp4">
      </video>  -->
    </div>
    <div class="line"></div>
    <div class="dis_comment">
      <h6>议一议</h6>
      @foreach($comment as $com)
      <div class="com_box">
        <dl>
          <dd><img src="{{$com->user_pic}}" alt=""></dd>
          <dt>
            <p class="dt_namet">{{$com->user_name}}<span>{{$com->time}}</span></p>
            <p class="dt_con">{{$com->content}}</p>
            <div class="reply">
              <p class="rep_com"><span>大漠孤者：</span>上市是一条捷径，三只松鼠有自身短板，哈
                资机构并不心，因此才有对赌协议。未来食品零售电商
                业发展，需平台提高准入门槛，加强前置事项规范和管
                加...</p>
              <p class="rep_com"><span>John：</span>上市是一条捷径，三只松鼠有自身短板，哈投资
                构并不心，因此才有对赌协议。未来食品零售电商行业
                展，需平台提高准入门</p>
              <p class="rep_t">哈哈哈</p>
              <p class="rep_com">回复<span>John：</span>上市是一条捷径，三只松鼠有自身短板，哈投资
                构并不心，因此才有对赌协议。未来食品零售电商行业
                展，需平台提高准入门</p>
              <p class="look"><a href="#">查看23条评论</a></p>
            </div>
            <p class="com_fun">
              <a href="javascript:;" class="Imgbox shoucang"><img src="{{asset('University/images/icon_shoucang@2x.png')}}" />收藏</a>
              <a href="#" class="Imgbox"><img src="{{asset('University/images/icon_pinglun@2x.png')}}" />评论</a>
              <a href="javascript:;" class="Imgbox zantong"><img src="{{asset('University/images/icon_dianzan1@2x.png')}}" />赞同</a>
              <a href="#" class="Imgbox"><img src="{{asset('University/images/icon_haibao@2x.png')}}" />海报</a>
            </p>
          </dt>
        </dl>
      </div>
      @endforeach
      <!-- <div class="com_box">
        <dl>
          <dd><img src="{{asset('University/images/jbdx_code.png')}}" alt=""></dd>
          <dt>
            <p class="dt_namet">哈哈哈<span>15分钟前</span></p>
            <p class="dt_con">上市是一条捷径，三只松鼠有自身短板，投资机构并不心，因
              此才有对赌协议。未来食品零售电商行业发展，需平台高准入
              门槛，加强前置事项规范和管理，加</p>
            <div class="reply">
              <p class="rep_com"><span>大漠孤者：</span>上市是一条捷径，三只松鼠有自身短板，哈
                资机构并不心，因此才有对赌协议。未来食品零售电商
                业发展，需平台提高准入门槛，加强前置事项规范和管
                加...</p>
              <p class="rep_com"><span>John：</span>上市是一条捷径，三只松鼠有自身短板，哈投资
                构并不心，因此才有对赌协议。未来食品零售电商行业
                展，需平台提高准入门</p>
              <p class="rep_t">哈哈哈</p>
              <p class="rep_com">回复<span>John：</span>上市是一条捷径，三只松鼠有自身短板，哈投资
                构并不心，因此才有对赌协议。未来食品零售电商行业
                展，需平台提高准入门</p>
              <p class="look"><a href="#">查看23条评论</a></p>
            </div>
            <p class="com_fun">
              <a href="javascript:;" class="Imgbox shoucang"><img src="University/images/icon_shoucang@2x.png" />收藏</a><a href="#" class="Imgbox"><img src="University/images/icon_pinglun@2x.png" />评论</a><a href="javascript:;" class="Imgbox zantong"><img src="University/images/icon_dianzan1@2x.png" />赞同</a><a href="#" class="Imgbox"><img src="University/images/icon_haibao@2x.png" />海报</a>
            </p>
          </dt>
        </dl>
      </div> -->
    </div>
  </div>


  <footer>
    <button onclick="window.location.href='{{url("university/discussion/content/id/".$discussion->id."/source/2")}}'">议一议</button>
  </footer>
  <script>
    $(document).ready(function () {
      $('.com_box').each(function(index) {
        $('.com_box').eq(index).find(".shoucang").click(function() {
          $(this).find("img").attr("src") == "University/images/icon_shoucang@2x.png"  ?  $(this).find("img").attr("src","University/images/icon_yishoucang@2x.png") : $(this).find("img").attr("src","University/images/icon_shoucang@2x.png")
        })
      })
      $('.com_box').each(function(index) {
        $('.com_box').eq(index).find(".zantong").click(function() {
          $(this).find("img").attr("src") == "University/images/icon_dianzan1@2x.png"  ?  $(this).find("img").attr("src","University/images/icon_dianzan@2x.png") : $(this).find("img").attr("src","University/images/icon_dianzan1@2x.png")
        })
      })
    })
  </script>
@stop