@extends('layouts.home')
@section('title',$data['title'])
@section('content')
<link rel="stylesheet" href="{{asset('Home/css/program.css')}}">
<link rel="stylesheet" href="{{asset('Home/css/college.css')}}">
<div class="wrapper">
    <div class="main1 clearfix">
        @include('layouts._header')
        <div class="main_tab">
            <ul id="myTab" class="nav_bot nav-tabs">
                @foreach($data['thrNav'] as $thrNav)
                <li class="{{$thrNav->id == $data['id'] ? 'active' : ''}}">
                    <a href="#visit_{{$thrNav->id}}" data-toggle="tab">
                        {{$thrNav->n_name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <div id="myTabContent" class="tab-content">
            @foreach($data['thrNav'] as $thrNav)
                <div class="tab-pane fade in active" id="visit_{{$thrNav->id}}">
                  <p class="hint">嘉宾派第三季</p>
                  <div class="coll-main">
                      <div class="coll-left">
                          <dl class="tab_list">
                              <a href="">
                                  <dt>
                                      <img src={{asset("Home/images/list1.png")}} alt="">
                                  </dt>
                                  <dd>
                                      <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                      <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                      <p class="tab_time">2018-8-10</p>
                                  </dd>
                              </a>
                          </dl>
                          <dl class="tab_list">
                              <a href="">
                                  <dt>
                                      <img src={{asset("Home/images/list1.png")}} alt="">
                                  </dt>
                                  <dd>
                                      <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                      <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                      <p class="tab_time">2018-8-10</p>
                                  </dd>
                              </a>
                          </dl>
                      </div>
                      <div class="coll-right">
                          <h3 class="rig_tit"><i class="icons"></i>相关推荐</h3>
                          <dl class="rig_dls">
                              <a href="">
                                  <dt class="dls_img">
                                      <img src={{asset("Home/images/list3.png")}} alt="">
                                  </dt>
                                  <dd class="dls_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                              </a>
                          </dl>
                          <dl class="rig_dls">
                              <a href="">
                                  <dt class="dls_img">
                                      <img src={{asset("Home/images/list3.png")}} alt="">
                                  </dt>
                                  <dd class="dls_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                              </a>
                          </dl>
                      </div>
                  </div>
                </div>
                
            @endforeach
            <!-- <div class="tab-pane fade" id="international">
            </div> -->
            </div>
        </div>
    </div>
</div>
@include('layouts._footer')
@stop