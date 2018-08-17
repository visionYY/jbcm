@extends('layouts.home')
@section('title',$data['title'])
@section('content')
    <link rel="stylesheet" href={{asset("Home/css/index.css")}}>
    <link rel="stylesheet" href="{{asset('Home/css/swiper.min.css')}}">
    <div class="wrapper">
            @include('layouts._header')
        <div class="main1 clearfix">
            <div class="main">
                <div class="main-left">
                	<div class="left-top">
	                	<!-- 广告 -->
	                    <div class="video swiper">
	                    	@if(config('hint.index_show_adv') ==1)
	                    	<video width="100%"  controls>
	                            <source src="{{$data['ind_vid_adv'][0]['video']}}">
	                            <source src="movie.ogg" type="video/ogg">
	                        </video>
	                        @else
	                        <div class="swiper-container">
	                            <div class="swiper-wrapper">
	                            @foreach($data['ind_sil_adv'] as $k=>$isa)
	                              <div class="swiper-slide">
	                                  <img src="{{asset($isa['cover'])}}" alt="">
	                              </div>
	                              @endforeach
	                            </div>
	                            <div class="swiper-pagination"></div>
	                            <div class="swiper-button-prev swiper-button-white"></div> <!-- 白色 -->
	                            <div class="swiper-button-next swiper-button-white"></div>
	                        </div>
	                        @endif
	                    </div>
	                    <div class="pic_list">
	                    	@foreach($data['ind_rig_adv'] as $k=>$ira)
	                        <p class="pic_lists">
	                            <a href="#">
	                                <img src="{{asset($ira['cover'])}}" alt="">
	                                <i class="pic_tit">{{$ira['title']}}
	                                    <span>top</span>{{$k+1}}</i>
	                            </a>
	                        </p>
	                        @endforeach
	                    </div>
                	</div>
                    <!-- 分类及下面的文章 -->
                    <div class="main_tab">
                        <ul id="myTab" class="nav_bot nav-tabs">
                        	@foreach($data['cate'] as $k=>$cate)
                            <li class="{{$k==0 ? 'active' : ''}}">
                                <a href="#ios_{{$k}}" data-toggle="tab">{{$cate['cg_name']}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div id="myTabContent" class="tab-content">
                        	@foreach($data['cate'] as $k=>$cate)
                            <div class="tab-pane fade {{$k==0 ? 'in active' : ''}}" id="ios_{{$k}}">
                            	<div class="cont_list">
	                            	@foreach($cate['content'] as $cont)
	                                <dl class="tab_list">
	                                    @if($cont->type ==1)
			                            <a href="{{url('article/id/'.$cont->id)}}">
			                            @else
			                            <a href="{{url('video/id/'.$cont->id)}}">
			                            @endif
	                                        <dt>
	                                            <img src={{asset($cont->cover)}} alt="">
	                                        </dt>
	                                        <dd>
	                                            <h4 class="tab_tit">{{$cont->title}}</h4>
	                                            <p class="tab_con">{{$cont->intro}}</p>
	                                            <p class="tab_time">{{substr($cont->publish_time,0,10)}}</p>
	                                            <span>{{$cont->n_name}}</span>
	                                        </dd>
	                                    </a>
	                                </dl>
	                                @endforeach

                                </div>
                                <!-- <dl class="tab_list">
                                    <a href="">
                                        <dt>
                                            <img src={{asset("Home/images/list1.png")}} alt="">
                                        </dt>
                                        <dd>
                                            <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                            <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                            <p class="tab_time">2018-8-10</p>
                                            <span>我有嘉宾</span>
                                        </dd>
                                    </a>
                                </dl> -->
                                <button cgid="{{$cate['id']}}" page="{{config('hint.show_num')}}" class="ckgd" style="width: 100%;height:30px;text-align: center;line-height: 30px;font-size: 16px;color: #00f;">查看更多</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="main-right">
                	<!-- 编辑精选 -->
                    <div class="rig-top">
                        <h3 class="rig_tit"><i class="icons"></i>编辑精选</h3>
                        @foreach($data['choi'] as $k=>$choi)
                        	
	                        <dl class="rig_dls">
	                        	@if($choi->type ==1)
	                            <a href="{{url('article/id/'.$choi->cho_id)}}">
	                            @else
	                            <a href="{{url('video/id/'.$choi->cho_id)}}">
	                            @endif
	                            	@if($k < 2)
	                                <dt class="dls_img">
	                                    <img src="{{asset($choi->cover)}}" alt="">
	                                </dt>
	                                <dd class="dls_tit">{{$choi->title}}</dd>
	                                @else
									<dt class="dls_imgs">
	                                    <img src="{{asset($choi->cover)}}" alt="">
	                                </dt>
	                                <dd class="dls_list">
	                                    <p>{{$choi->title}}</p>
	                                    <p class="dls_time">{{substr($choi->publish_time,0,10)}}</p>
	                                </dd>
	                                @endif
	                            </a>
	                        </dl>
                        @endforeach
                    </div>
                    <!-- 导师与学员 -->
                    <div class="rig-bot">
                        <h3 class="rig_tit"><i class="icons"></i>导师与学员</h3>
                        @foreach($data['tutor'] as $totur)
                        <dl class="tutor">
                            <a href="">
                                <dt class="tutor-img">
                                    <img src="{{asset($totur->head_pic)}}" alt="">
                                </dt>
                                <dd>
                                    <p class="tutor-name">{{$totur->name}}</p>
                                    <p class="tutor-txt">{{$totur->intro}}</p>
                                    <p class="classify">{{$totur->type == 1 ? '导师' : '学员 '}}</p>
                                </dd>
                            </a>
                        </dl>
                        @endforeach
                        <button  id="more" onClick="location.href='{{url('tutorStudent/oneId/3/secId/11')}}'">查看更多导师与学员</button>
                    </div>
                </div>
            </div>
    	</div>
    </div>
    <input type="hidden" name="url" value="{{url('getCategoryPage')}}">
    @include('layouts._footer')
    <script src="{{asset('Home/js/swiper.min.js')}}"></script>
    <script type="text/javascript">
        window.onload = function() {
            var mySwiper = new Swiper ('.swiper-container', {
                autoplay : 3000,    //可选选项，自动滑动
                pagination : '.swiper-pagination',
                paginationClickable :true,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                autoplayDisableOnInteraction : false,    //注意此参数，默认为true
            });
        }   
    </script>
    <script type="text/javascript">
    	var url = $('[name=url]').val();
    	$('.ckgd').click(function(){
    		var thisObj = $(this);
    		var cgid = thisObj.attr('cgid'),
    			page = thisObj.attr('page');
    		$.ajax({url:url,
    				type:'GET',
    				data:{cgid:cgid,page:page},
    				dataType:'json',
    				success:function(d){
    					thisObj.attr('page',parseInt(page)+{{config('hint.show_num')}});
    					var html = '';
    					console.log(d);
    					if (d != 0) {
    						$.each(d,function(index,item){
    							html += '<dl class="tab_list"><a href="'+item.url+'">';
    							html += '<dt><img src="'+item.cover+'" alt=""></dt>';
    							html += '<dd><h4 class="tab_tit">'+item.title+'</h4>';
    							html += '<p class="tab_con">'+item.intro+'</p>';
    							html += '<p class="tab_time">'+item.publish_time.substr(0,10)+'</p><span>'+item.n_name+'</span></dd></a></dl>';
    						});
    					}else{
    						 html += '<p style="width: 100%;height:30px;text-align: center;line-height: 30px;font-size: 16px;color: #f00;">已经到最底部了</p>';
    						 thisObj.hide();
    					}
    					thisObj.prev().append(html);
    				}})
    		
    	})
    </script>
@stop