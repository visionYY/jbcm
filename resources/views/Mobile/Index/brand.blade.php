@extends('layouts.mobile')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Mobile/css/two-list.css')}}">
  <div data-role="page" id="pageone">
     @include('layouts.m_header')
    <div class="centera">
      <ul id="oranger"> 
        <li><a class="hover" href="javascript:;">我有嘉宾</a> </li>
        <li><a href="javascript:;">企业纪录片</a> </li>
      </ul>
      <div id="tablea" class="tablea">
        <div class="box">
          <div class="banner">
            <img src="{{asset('Mobile/images/toutu.png')}}" alt="">
          </div>
          <div class="con">
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <dl class="list">
              <a href="article-detail.html">
                <dt class="list-img"><img src="{{asset('Mobile/images/img1.png')}}" alt=""></dt>
                <dd>
                  <p class="list-tit">健租宝李锦全：不追共享概念健租宝李锦全：不追共享概念</p>
                  <p class="list-but"><span class="sp-time">三小时前</span><span class="sp-kind">我有嘉宾</span></p>
                </dd>
              </a>
            </dl>
            <p class="load">加载更多</p>
          </div>
        </div>
        <div class="box">
          <div class="video">
            <video width="100%"  controls>
              <source src="http://1256356427.vod2.myqcloud.com/12b315c8vodgzp1256356427/3a41bf907447398156921405349/W42LpYmyxX0A.mp4?nsukey=mYSh%2FpaubhjtG1T1N7Z1dcVsOMp4O6nD78YAqcNmlon9%2B9MxTpNQmXu2jmPjPUtav2tT4JY3B6YGn7FnJlmQLQqDDFUU7nMorWbTHtAY2p8DEuWfV6a54kINIU%2FSnr16EB49D5kfXbVzN31pU%2BuMTd%2BQby9QP1a7WEJ33pjJDfggbq5rY4oV19wduJ6ogSzTHa9CB4ObhKvV9ANilf8TUg%3D%3D" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
            </video>
            <p class="video-tit">映客企业纪录片（20分钟）</p>
          </div>
          <div class="video">
            <video width="100%"  controls>
              <source src="http://1256356427.vod2.myqcloud.com/12b315c8vodgzp1256356427/3a41bf907447398156921405349/W42LpYmyxX0A.mp4?nsukey=mYSh%2FpaubhjtG1T1N7Z1dcVsOMp4O6nD78YAqcNmlon9%2B9MxTpNQmXu2jmPjPUtav2tT4JY3B6YGn7FnJlmQLQqDDFUU7nMorWbTHtAY2p8DEuWfV6a54kINIU%2FSnr16EB49D5kfXbVzN31pU%2BuMTd%2BQby9QP1a7WEJ33pjJDfggbq5rY4oV19wduJ6ogSzTHa9CB4ObhKvV9ANilf8TUg%3D%3D" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
            </video>
            <p class="video-tit">映客企业纪录片（20分钟）</p>
          </div>
          <div class="video">
            <video width="100%"  controls>
              <source src="http://1256356427.vod2.myqcloud.com/12b315c8vodgzp1256356427/3a41bf907447398156921405349/W42LpYmyxX0A.mp4?nsukey=mYSh%2FpaubhjtG1T1N7Z1dcVsOMp4O6nD78YAqcNmlon9%2B9MxTpNQmXu2jmPjPUtav2tT4JY3B6YGn7FnJlmQLQqDDFUU7nMorWbTHtAY2p8DEuWfV6a54kINIU%2FSnr16EB49D5kfXbVzN31pU%2BuMTd%2BQby9QP1a7WEJ33pjJDfggbq5rY4oV19wduJ6ogSzTHa9CB4ObhKvV9ANilf8TUg%3D%3D" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
            </video>
            <p class="video-tit">映客企业纪录片（20分钟）</p>
          </div>
          <div class="video">
            <video width="100%"  controls>
              <source src="http://1256356427.vod2.myqcloud.com/12b315c8vodgzp1256356427/3a41bf907447398156921405349/W42LpYmyxX0A.mp4?nsukey=mYSh%2FpaubhjtG1T1N7Z1dcVsOMp4O6nD78YAqcNmlon9%2B9MxTpNQmXu2jmPjPUtav2tT4JY3B6YGn7FnJlmQLQqDDFUU7nMorWbTHtAY2p8DEuWfV6a54kINIU%2FSnr16EB49D5kfXbVzN31pU%2BuMTd%2BQby9QP1a7WEJ33pjJDfggbq5rY4oV19wduJ6ogSzTHa9CB4ObhKvV9ANilf8TUg%3D%3D" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
            </video>
            <p class="video-tit">映客企业纪录片（20分钟）</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('Mobile/js/jquery-1.10.1.min.js')}}"></script>
  <script src="{{asset('Mobile/js/swiper.min.js')}}"></script>
  <script src="{{asset('Mobile/js/iscroll.js')}}"></script>
  <script>
    $(".tablea").find(".box:first").show();    //为每个BOX的第一个元素显示        
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