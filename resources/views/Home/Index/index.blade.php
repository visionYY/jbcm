@extends('layouts.home')
@section('title',$data['title'])
@section('content')
    <link rel="stylesheet" href={{asset("Home/css/index.css")}}>
    <div class="wrapper">
    	 @include('layouts._header')
        <div class="main1 clearfix">
            <div class="main">
                <div class="main-left">
                    <div class="video swiper">
                        <!-- <video width="100%"  controls>
                            <source src="http://1256356427.vod2.myqcloud.com/12b315c8vodgzp1256356427/3a41bf907447398156921405349/W42LpYmyxX0A.mp4?nsukey=mYSh%2FpaubhjtG1T1N7Z1dcVsOMp4O6nD78YAqcNmlon9%2B9MxTpNQmXu2jmPjPUtav2tT4JY3B6YGn7FnJlmQLQqDDFUU7nMorWbTHtAY2p8DEuWfV6a54kINIU%2FSnr16EB49D5kfXbVzN31pU%2BuMTd%2BQby9QP1a7WEJ33pjJDfggbq5rY4oV19wduJ6ogSzTHa9CB4ObhKvV9ANilf8TUg%3D%3D" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video> -->
                        <div id="myCarousel" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"> </li>
                                <li data-target="#myCarousel" data-slide-to="1"> </li>
                                <li data-target="#myCarousel" data-slide-to="2"> </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active" style="background:#223240;">
                                    <a href="#">
                                        <img src={{asset("Home/images/banner.jpeg")}} alt="第一张" />
                                    </a>
                                </div>
                                <div class="item" style="background:#F5E4DC;">
                                    <a href="#"></a>
                                    <img src={{asset("Home/images/banner.jpeg")}} alt="第二张" />
                                    </a>
                                </div>
                                <div class="item" style="background:#DE2A2D;">
                                    <a href="#"></a>
                                    <img src={{asset("Home/images/banner.jpeg")}} alt="第三张" />
                                    </a>
                                </div>

                            </div>

                            <a href="#myCarousel" data-slide="prev" class="carousel-control left">
                                <span class="glyphicon glyphicon-chevron-left"> </span>
                            </a>
                            <a href="#myCarousel" data-slide="next" class="carousel-control right">
                                <span class="glyphicon glyphicon-chevron-right"> </span>
                            </a>
                        </div>
                    </div>
                    <div class="pic_list">
                        <p class="pic_lists">
                            <a href="#">
                                <img src={{asset("Home/images/list1.png")}} alt="">
                                <i class="pic_tit">时间影响力·中国商业案例
                                    <span>top</span>3</i>
                            </a>
                        </p>
                        <p class="pic_lists">
                            <a href="#">
                                <img src={{asset("Home/images/list1.png")}} alt="">
                                <i class="pic_tit">时间影响力·中国商业案例
                                    <span>top</span>3</i>
                            </a>
                        </p>
                        <p class="pic_lists">
                            <a href="#">
                                <img src={{asset("Home/images/list1.png")}} alt="">
                                <i class="pic_tit">时间影响力·中国商业案例
                                    <span>top</span>3</i>
                            </a>
                        </p>
                    </div>
                    <div class="main_tab">
                        <ul id="myTab" class="nav_bot nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">
                                    最新动态
                                </a>
                            </li>
                            <li>
                                <a href="#ios" data-toggle="tab">人物</a>
                            </li>
                            <li>
                                <a href="#ios" data-toggle="tab">观点</a>
                            </li>
                            <li>
                                <a href="#ios" data-toggle="tab">案例</a>
                            </li>
                            <li>
                                <a href="#ios" data-toggle="tab">视频</a>
                            </li>
                            <li>
                                <a href="#ios" data-toggle="tab">荐读</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <dl class="tab_list">
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
                                            <span>我有嘉宾</span>
                                        </dd>
                                    </a>
                                </dl>
                            </div>
                            <div class="tab-pane fade" id="ios">
                                <dl class="tab_list">
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
                                </dl>
                            </div>
                            <div class="tab-pane fade" id="ios">
                                <dl class="tab_list">
                                    <a href="">
                                        <dt>
                                            <img src="Home/images/list1.png" alt="">
                                        </dt>
                                        <dd>
                                            <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                            <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                            <p class="tab_time">2018-8-10</p>
                                            <span>我有嘉宾</span>
                                        </dd>
                                    </a>
                                </dl>
                            </div>
                            <div class="tab-pane fade" id="ios">
                                <dl class="tab_list">
                                    <a href="">
                                        <dt>
                                            <img src="Home/images/list1.png" alt="">
                                        </dt>
                                        <dd>
                                            <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                            <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                            <p class="tab_time">2018-8-10</p>
                                            <span>我有嘉宾</span>
                                        </dd>
                                    </a>
                                </dl>
                            </div>
                            <div class="tab-pane fade" id="ios">
                                <dl class="tab_list">
                                    <a href="">
                                        <dt>
                                            <img src="Home/images/list1.png" alt="">
                                        </dt>
                                        <dd>
                                            <h4 class="tab_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格护发素地方官方代购的风格</h4>
                                            <p class="tab_con">哈佛受到核辐射东方哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东哈佛受到核辐射东红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山哈佛受到核辐射东方红山东红富士豆腐红烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧烧豆腐上的粉红色粉红色豆腐红烧豆腐红烧豆腐红烧豆腐合适的合法身份粉红色的护发素东方红送的风好舒服</p>
                                            <p class="tab_time">2018-8-10</p>
                                            <span>我有嘉宾</span>
                                        </dd>
                                    </a>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-right">
                    <div class="rig-top">
                        <h3 class="rig_tit"><i class="icons"></i>编辑精选</h3>
                        <dl class="rig_dls">
                            <a href="">
                                <dt class="dls_img">
                                    <img src="Home/images/list3.png" alt="">
                                </dt>
                                <dd class="dls_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                            </a>
                        </dl>
                        <dl class="rig_dls">
                            <a href="">
                                <dt class="dls_img">
                                    <img src="Home/images/list3.png" alt="">
                                </dt>
                                <dd class="dls_tit">放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</dd>
                            </a>
                        </dl>
                        <dl class="rig_dls">
                            <a href="">
                                <dt class="dls_imgs">
                                    <img src="Home/images/list3.png" alt="">
                                </dt>
                                <dd class="dls_list">
                                    <p>放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</p>
                                    <p class="dls_time">2018-2-2</p>
                                </dd>
                            </a>
                        </dl>
                        <dl class="rig_dls">
                            <a href="">
                                <dt class="dls_imgs">
                                    <img src="Home/images/list3.png" alt="">
                                </dt>
                                <dd class="dls_list">
                                    <p>放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</p>
                                    <p class="dls_time">2018-2-2</p>
                                </dd>
                            </a>
                        </dl>
                        <dl class="rig_dls">
                            <a href="">
                                <dt class="dls_imgs">
                                    <img src="Home/images/list3.png" alt="">
                                </dt>
                                <dd class="dls_list">
                                    <p>放到沙发上豆腐红烧豆腐红烧豆腐还是大放送的护发素地方官方代购的风格</p>
                                    <p class="dls_time">2018-2-2</p>
                                </dd>
                            </a>
                        </dl>
                    </div>
                    <div class="rig-bot">
                        <h3 class="rig_tit"><i class="icons"></i>导师与学员</h3>
                        <div class="bot-box">
                            <img src="Home/images/WechatIMG2.jpeg" alt="">
                            <p class="name">周宏伟</p>
                            <p class="post">360CEO</p>
                            <p class="classify">导师</p>
                        </div>
                        <div class="bot-box">
                            <img src="Home/images/WechatIMG2.jpeg" alt="">
                            <p class="name">周宏伟</p>
                            <p class="post">360CEO</p>
                            <p class="classify">导师</p>
                        </div>
                        <button  id="more" onClick="location.href='../study/study.html'">查看更多</button>
                    </div>
                </div>
            </div>
    </div>
    </div>

    @include('layouts._footer')
    <script type="text/javascript">
        $(function(){
                $('#myCarousel').carousel({interval:2000});
            })
    </script>
@stop