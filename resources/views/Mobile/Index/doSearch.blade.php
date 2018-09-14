@extends('layouts.mobile')
@section('title',$data['title'])
@section('content')
  <link rel="stylesheet" href="{{asset('Mobile/css/search.css')}}">
  <div class="centera cen">
    <form action="">
    <p class="sea-inp"><input type="text" value="{{$data['keybord']}}"><i class="icon iconfont icon-iconsousuo"></i></p>
    </form>
    @if($data['res'])
    <div class="">
      @foreach($data['res'] as $res)
      <dl class="list">
        @if($res->type == 1)
        <a href="{{url('mobile/article/id/'.$res->id)}}">
        @else
        <a href="{{url('mobile/video/id/'.$res->id)}}">  
        @endif
          <dt class="list-img"><img src="{{url($res->cover)}}" alt=""></dt>
          <dd>
            <p class="list-tit">{{$res->title}}</p>
            <p class="list-but"><span class="sp-time">{{$res->publish_time}}</span><span class="sp-kind">{{$res->n_name}}</span></p>
          </dd>
        </a>
      </dl>
      @endforeach
        <!-- <p class="load">加载更多</p> -->
    </div>
    @else
    <div class="con-none">
      <i class="icon iconfont icon-weibiaoti3"></i>
      <p>没有搜索到相关内容哦！</p>
    </div>
    @endif
  </div>

  <script src="{{asset('Mobile/js/jquery-1.10.1.min.js')}}"></script>
  <script src="{{asset('Mobile/js/swiper.min.js')}}"></script>
  <script src="{{asset('Mobile/js/iscroll.js')}}"></script>
  <script src="{{asset('Mobile/js/index.js')}}"></script>
  <script>
      $(document).ready(function(){
        var mySwiper = new Swiper(".swiper-container",{
                      autoplay:2000,
                      loop:true,//循环
                      pagination : '.swiper-pagination',
                      paginationClickable :true,
                      observer:true,//修改swiper自己或子元素时，自动初始化swiper
                      observeParents:true,//修改swiper的父元素时，自动初始化swiper
                  })
      });
      
    </script>
@stop