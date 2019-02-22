@extends('layouts.university')
@section('title','课程')
@section('content')
  <link rel="stylesheet" href="{{asset('University/css/audio.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('University/css/video.css')}}">
   
  <div class="wrapper">
    <div class="bad-video">
      @if($course->oneType ==0 || Auth::guard('university')->check() && $course->is_pay != 1 && $course->isBuy==1)
      <video class="" poster="{{asset($course->crosswise_cover)}}" webkit-playsinline style="object-fit:fill;">
          <source src="{{$course->oneVideo}}" type="video/mp4">            
          <p>设备不支持</p>
      </video>
      @else
      <div class="nopay">
          <p class="nopay_com">开通后才能继续学习~</p>
          @if(Auth::guard('university')->check())
          <button class="nopay_btn onBuy">立即开通</button>
          @else
          <button class="nopay_btn onlogin">立即开通</button>
          @endif
          <img src="{{asset('University/images/icon_yinpin@2x.png')}}" class="vaudio"/>
          <img src="{{asset('University/images/icon_vshoucang.png')}}" class="vcollect onlogin"/>
      </div>
      @endif
    </div>
    <div id="centera">
      <div class="orangerb">
        <ul id="oranger"> 
          <li class="hover">课程介绍</li> 
          <li>课程目录</li> 
        </ul>
      </div>
      <div id="tablea" class="tablea">
        <div class="box">
          <p class="class_tit"><span></span>{{$course->name}}</p>
          <p class="class_guest">{{$course->intro}}</p>
        </div>
        <div class="box">
          <div class="container">
            <div class="tab-head">
              <ul>
                <li class="selected-li">课程目录</li>
                <li class="normal-li">自测题</li>
              </ul>
            </div>
            <div class="tab-content">
              {{--课程内容--}}
              <div class="box2">
                @foreach($contents as $content)
                  @if($content->type == 0 || Auth::guard('university')->check())
                  <div class="class_list">
                    <p class="list_name">
                      <span class="col">{{$content->chapter}} {{$content->title}}</span>
                      <span><img class="bianj" src="{{asset('University/images/icon_bianji@2x2.png')}}" alt=""></span>
                    </p>
                    {{--学习状态--}}
                    <p class="list_time"><span class="notice">预告</span>{{substr($content->time,3,5)}}<span class="acc">已完成</span></p>
                    <p class="list_img"><img src="{{asset('University/images/icon_zhankai@2x.png')}}" alt=""></p>
                    <div class="lisImgBox">{{$content->intro}}</div>
                  </div>
                  @else
                  <div class="class_list">
                    <p class="list_name">
                      <span>{{$content->chapter}} {{$content->title}}</span>
                      <span><img src="{{asset('University/images/icon_suo@2x.png')}}" alt=""></span>
                    </p>
                    <p class="list_time">{{substr($content->time,3,5)}}</p>
                    <p class="list_img"><img src="{{asset('University/images/icon_zhankai@2x.png')}}" alt=""></p>
                  </div> 
                  @endif
                @endforeach
                
                <!-- <div class="class_list">
                  <p class="list_name">
                    <span>03   人力资源管理教育预告片</span>
                    <span><img src="{{asset('University/images/icon_suo@2x.png')}}" alt=""></span>
                  </p>
                  <p class="list_time">11:05</p>
                  <p class="list_img"><img src="{{asset('University/images/icon_zhankai@2x.png')}}" alt=""></p>
                </div> -->
              </div>
              {{--自测试题--}}
              <div class="box2"  style="display: none">
                @foreach($contents as $content)
                  @if($course->oneType == 0 || Auth::guard('university')->check())
                  
                  <div class="class_list">
                    <p class="biaoqian"><img src="{{asset('University/images/icon_biaoqianlan@2x.png')}}" alt=""></p>
                    <div class="lis">
                      <p class="cons blue">(5/{{$content->quizCount}}）</p>
                      <p class="con blue">{{$content->chapter}}</p>
                      <p class="lis_tit blue">{{$content->title}}</p>
                    </div>
                    
                    <div class="testBox">
                      @foreach($content->quizs as $k=>$quiz)
                      <div class="topicbox">
                        <p class="t_tit"><span>(单选）</span>{{$k}}. {{$quiz->title}}</p>
                        @foreach($quiz->answers as $ak=>$answer)
                        <input type="radio"  id="radio_{{$ak}}"  name="one_{{$ak}}" />
                        <label class="label" for="radio_{{$ak}}">{{$answer->card}}. {{$answer->answer}}</label>
                        @endforeach                      
                      </div>
                      @endforeach
                      <button class="sub">提交</button>
                    </div>
                  </div>
                 
                  @else
                  <div class="class_list">
                    <p class="biaoqian"><img src="{{asset('University/images/icon_biaoqianlan@2x.png')}}" alt=""></p>
                    <div class="lis">
                      <p class="cons">({{$content->quizCount}}/{{$content->quizCount}}）</p>
                      <p class="con">{{$content->chapter}}</p>
                      <p class="lis_tit">{{$content->title}}</p>
                      <p class="imag"><img src="{{asset('University/images/icon_suo@2x.png')}}" alt=""></p>
                    </div>
                  </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--判断是否登陆--}}
    @if(Auth::guard('university')->check())
      {{--判断是否收费课--}}
      @if($course->is_pay == 1)
        {{--判断是否购买--}}
        @if($course->isBuy != 1)
        <button class="btn onBuy">开通课程 | ￥99</button>
        @endif
      @endif
    @else
        <button class="btn onlogin">开通课程 | ￥99</button>
    @endif
    <div class="hint">购买后才能继续学习</div>
    @if($course->oneType == 0 || Auth::guard('university')->check())
    <div class="wengaotab denlu"><img src="{{asset('University/images/icon_wengao@2x.png')}}" alt=""></div>
    <div class="wengaobox">{{$course->oneContent}}</div>
    @else
    <div class="wengaotab onlogin"><img src="{{asset('University/images/icon_wengao@2x.png')}}" alt=""></div>
    @endif
  </div>
  {{-- 登陆地址 --}}
  <input type="hidden" name="loginUrl" value="{{url('university/login?source=4&yid='.$course->id)}}">

    <!-- <script type="text/javascript" src="{{asset('University/js/audio.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('University/js/mui.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('University/js/bvd.js')}}"></script> -->
    @if($course->oneType ==0 || Auth::guard('university')->check())
    <script type="text/javascript">
      (function($) {
        var bvd = function(dom) {
          var that = this;
          $.ready(function() {
            //获取视频元素
            that.video = document.querySelector(dom || "video");
            //获取视频父元素
            that.vRoom = that.video.parentNode;
            //元素初始化
            that.initEm();
            //事件初始化
            that.initEvent();
            //记录信息
            that.initInfo();
            //当前播放模式 false 为 mini播放
            that.isMax = false;
          });
        };

        var pro = bvd.prototype;

        //记录信息
        pro.initInfo = function() {
          var that = this;
          //在onload状态下，offsetHeight才会获取到正确的值
          window.onload = function() {
            that.miniInfo = {
              //mini状态时的样式
              width: that.video.offsetWidth + "px",
              height: that.video.offsetHeight + "px",
              position: that.vRoom.style.position,
              transform: "translate(0,0) rotate(0deg)"
            };

            var info = [
                document.documentElement.clientWidth || document.body.clientWidth,
                document.documentElement.clientHeight || document.body.clientHeigth
              ],
              w = info[0],
              h = info[1],
              cha = Math.abs(h - w) / 2;

            that.maxInfo = {
              //max状态时的样式
              zIndex: 99,
              width: h + "px",
              height: w + "px",
              position: "fixed",
              transform: "translate(-" + cha + "px," + cha + "px) rotate(90deg)"
            };
          };
        };

        pro.initEm = function() {
          //先添加上一个按钮
          this.vtop = document.createElement("img");
          this.vtop.src = "{{asset('University/images/icon_zuojin@2x.png')}}";
          this.vtop.className = "vtop";
          this.vRoom.appendChild(this.vtop);

          // 暂停中间按钮
          this.simg = document.createElement("img");
          this.simg.src = "{{asset('University/images/pause.png')}}";
          this.simg.className = "pause";
          this.vRoom.appendChild(this.simg);

          //先添加下一个按钮
          this.vbelow = document.createElement("img");
          this.vbelow.src = "{{asset('University/images/icon_youjin@2x.png')}}";
          this.vbelow.className = "vbelow";
          this.vRoom.appendChild(this.vbelow);

          //先添加音频按钮
          this.vaudio = document.createElement("img");
          this.vaudio.src = "{{asset('University/images/icon_yinpin@2x.png')}}";
          this.vaudio.className = "vaudio";
          this.vRoom.appendChild(this.vaudio);

          //先添加收藏按钮
          this.vcollect = document.createElement("img");
          this.vcollect.src = "{{asset('University/images/icon_vshoucang.png')}}";
          this.vcollect.className = "vcollect";
          this.vRoom.appendChild(this.vcollect);

          //先添加播放按钮
          this.vimg = document.createElement("img");
          this.vimg.src = "{{asset('University/images/play2.png')}}";
          this.vimg.className = "vplay";
          this.vRoom.appendChild(this.vimg);

          //添加控制条
          this.vC = document.createElement("div");
          this.vC.classList.add("controls");
          this.vC.innerHTML =
            '<div><div class="progressBar"><span id="cricle"></span><div class="timeBar"></div></div></div><div><span class="current">00:00</span><span class="duration">00:00</span></div><div><img class="fill" src="' +
            "{{asset('University/images/icon_quanping@2x.png')}}" +
            '" alt=""></div>';
          this.vRoom.appendChild(this.vC);

        };

        pro.initEvent = function() {
          var that = this;

          var isScroll = false;
          var nowPage = "small";

          //切换音频
          this.vaudio.addEventListener("touchend", function() {
            location.href ="audio.html"
          });
          
          //给播放按钮图片添加事件
          this.vimg.addEventListener("tap", function() {
            isScroll = false;
            that.video.play();
          });


          //获取到元数据
          this.video.addEventListener("loadedmetadata", function() {
            that.vDuration = this.duration;
            that.vC.querySelector(".duration").innerHTML = stom(that.vDuration);
          });

          var allEvents = {};
          //视频播放事件
          this.video.addEventListener("play", function() {
            if (!isScroll) {
              that.vimg.style.display = "none";
              that.simg.style.display = "block";
              setTimeout(function() {
                that.simg.style.display = "none";
                that.vtop.style.display = "none";
                that.vbelow.style.display = "none";
                that.vaudio.style.display = "none";
                that.vcollect.style.display = "none";
                that.vC.classList.add("vhidden");
                that.vC.style.visibility = "hidden";
              });
            }

            var isThat = this;
            if (nowPage == "small") {
              // 拖动开始的X轴距离
              var startX = 0;
              // 距离左边的距离
              var leftAll = 0;
              // 进度条元素总长度
              var allW = parseFloat(
                getComputedStyle(that.vC.querySelector(".progressBar"), null)["width"]
              );
              var btnLeft = 0;

              function smallStart(e) {
                allEvents.touchstart = 1;
                isThat.pause();
                startX = e.touches[0].clientX;
                btnLeft = getComputedStyle(that.vC.querySelector("#cricle"), null)[
                  "left"
                ];
              }

              function smallEnd(e) {
                allEvents.touchend = 1;
                var overTime = stom((leftAll / allW) * isThat.duration);
                that.vC.querySelector(".current").innerHTML = overTime;
                var nowTime =
                  Math.round((leftAll / allW) * isThat.duration) - isThat.currentTime;
                that.setCurrentTime(nowTime);
                that.vimg.style.display = "none";
                that.simg.style.display = "block";
                isScroll = true;
                that.video.play();
              }

              function smallMove(e) {
                allEvents.touchmove = 1;
                var endFlo = e.touches[0].clientX - startX + parseFloat(btnLeft);
                if (endFlo > allW) {
                  endFlo = allW;
                } else if (endFlo < 0) {
                  endFlo = 0;
                }
                leftAll = endFlo;
                that.vC.querySelector(".timeBar").style.width = endFlo + "px";
                that.vC.querySelector("#cricle").style.left = endFlo + "px";
              }

              // 滚动条圆点拖动开始
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchstart", smallStart, false);
              // 滚动条圆点拖动时
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchmove", smallMove, false);
              // 滚动条圆点拖动结束
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchend", smallEnd, false);
            } else {
              // 拖动开始的X轴距离
              var startY = 0;
              // 距离左边的距离
              var leftAll = 0;
              // 进度条元素总长度
              var allW = parseFloat(
                getComputedStyle(that.vC.querySelector(".progressBar"), null)["width"]
              );
              var btnLeft = 0;

              // 滚动条圆点拖动开始
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchstart", function(e) {
                  isThat.pause();
                  startY = e.touches[0].clientY;
                  btnLeft = getComputedStyle(that.vC.querySelector("#cricle"), null)[
                    "left"
                  ];
                });
              // 滚动条圆点拖动时
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchmove", function(e) {
                  var endFlo = e.touches[0].clientY - startY + parseFloat(btnLeft);
                  if (endFlo > allW) {
                    endFlo = allW;
                  } else if (endFlo < 0) {
                    endFlo = 0;
                  }
                  leftAll = endFlo;
                  that.vC.querySelector(".timeBar").style.width = endFlo + "px";
                  that.vC.querySelector("#cricle").style.left = endFlo + "px";
                });
              // 滚动条圆点拖动结束
              that.vC
                .querySelector("#cricle")
                .addEventListener("touchend", function(e) {
                  var overTime = stom((leftAll / allW) * isThat.duration);
                  that.vC.querySelector(".current").innerHTML = overTime;
                  var nowTime =
                    Math.round((leftAll / allW) * isThat.duration) -
                    isThat.currentTime;
                  that.setCurrentTime(nowTime);
                  that.vimg.style.display = "none";
                  that.simg.style.display = "block";
                  isScroll = true;
                  that.video.play();
                });
            }
          });

          //视频播放中事件
          this.video.addEventListener("timeupdate", function() {
            var currentPos = this.currentTime; //获取当前播放的位置
            //更新进度条
            var percentage = (100 * currentPos) / that.vDuration;
            that.vC.querySelector("#cricle").style.left = percentage + "%";
            that.vC.querySelector(".timeBar").style.width = percentage + "%";

            //更新当前播放时间
            that.vC.querySelector(".current").innerHTML = stom(currentPos);
          });

          //视频点击暂停或播放事件
          this.video.addEventListener("tap", function() {
            if (this.paused || this.ended) {
              //暂停时点击就播放
              if (this.ended) {
                //如果播放完毕，就重头开始播放
                this.currentTime = 0;
              }
              isScroll = false;
              this.play();
            } else {
              //播放时点击就暂停
              // this.pause();
              var olthat = this;
              that.simg.addEventListener("tap", function() {
                that.vimg.style.display = "block";
                that.simg.style.display = "none";
                olthat.pause();
              });
              if (that.vtop.style.display == "none") {
                that.simg.style.display = "block";
                that.vtop.style.display = "block";
                that.vbelow.style.display = "block";
                that.vaudio.style.display = "block";
                that.vcollect.style.display = "block";
                that.vC.classList.remove("vhidden");
                that.vC.style.visibility = "visible";
              } else {
                that.simg.style.display = "none";
                that.vtop.style.display = "none";
                that.vbelow.style.display = "none";
                that.vaudio.style.display = "none";
                that.vcollect.style.display = "none";
                that.vC.classList.add("vhidden");
                that.vC.style.visibility = "hidden";
              }
            }
          });

          //暂停or停止
          this.video.addEventListener("pause", function() {
            that.simg.style.display = "none";
            that.vimg.style.display = "block";
            that.vtop.style.display = "block";
            that.vbelow.style.display = "block";
            that.vaudio.style.display = "block";
            that.vcollect.style.display = "block";
            that.vC.classList.remove("vhidden");
            that.vC.style.visibility = "visible";
            that.vCt && clearTimeout(that.vCt);
          });

          //转换音频
          this.vaudio.click(function() {
            
          });

          //视频手势右滑动事件
          this.eve("swiperight", function() {
            if (that.isMax) {
              return that.setVolume(0.2);
            }
            that.setCurrentTime(10);
          });

          //视频手势左滑动事件
          this.eve("swipeleft", function() {
            if (that.isMax) {
              return that.setVolume(-0.2);
            }
            that.setCurrentTime(-10);
          });

          //视频手势上滑动事件
          this.eve("swipeup", function() {
            if (that.isMax) {
              return that.setCurrentTime(-5);
            }
            that.setVolume(0.2);
          });

          //视频手势下滑动事件
          this.eve("swipedown", function() {
            if (that.isMax) {
              return that.setCurrentTime(5);
            }
            that.setVolume(-0.2);
          });

          this.vC.querySelector(".fill").addEventListener("tap", function() {
            //that.nativeMax();
            that.switch();
            if (nowPage == "small") {
              nowPage = "lage";
            } else {
              nowPage = "small";
            }
          });
        };

        //全屏 mini 两种模式切换
        pro.switch = function() {
          var vR = this.vRoom;
          //获取需要转换的样式信息
          var info = this.isMax ? this.miniInfo : this.maxInfo;
          for (var i in info) {
            vR.style[i] = info[i];
          }
          this.isMax = !this.isMax;
        };

        //使用原生支持的方式播放
        pro.nativeMax = function() {
          if (!window.plus) {
            //非html5+环境
            return;
          }
          if ($.os.ios) {
            console.log("ios");
            this.video.removeAttribute("webkit-playsinline");
          } else if ($.os.android) {
            console.log("android");
            var url = this.video.querySelector("source").src;
            var Intent = plus.android.importClass("android.content.Intent");
            var Uri = plus.android.importClass("android.net.Uri");
            var main = plus.android.runtimeMainActivity();
            var intent = new Intent(Intent.ACTION_VIEW);
            var uri = Uri.parse(url);
            intent.setDataAndType(uri, "video/*");
            main.startActivity(intent);
          }
        };

        //跳转视频进度 单位 秒
        pro.setCurrentTime = function(t) {
          this.video.currentTime += t;
        };
        //设置音量大小 单位 百分比 如 0.1
        pro.setVolume = function(v) {
          this.video.volume += v;
        };
        //切换播放地址
        pro.setUrl = function(nUrl) {
          var v = this.video;
          var source = v.querySelector("source");
          source.src = v.src = nUrl;
          source.type = "video/" + nUrl.split(".").pop();
          isScroll = false;
          v.play();
        };

        var events = {};

        //增加 或者删除事件    isBack 是否返回  这次添加事件时 被删除 的上一个 事件
        pro.eve = function(ename, callback, isBack) {
          var fn;
          if (callback && typeof callback == "function") {
            isBack && (fn = arguments.callee(ename));
            events[ename] = callback;
            this.video.addEventListener(ename, events[ename]);
            console.log("添加事件：" + ename);
          } else {
            fn = events[ename];
            fn && this.video.removeEventListener(ename, fn);
            console.log("删除事件：" + ename);
          }

          return fn;
        };

        function stom(t) {
          var m = Math.floor(t / 60);
          m < 10 && (m = "0" + m);
          return m + ":" + ((t % 60) / 100).toFixed(2).slice(-2);
        }

        var nv = null;
        $.bvd = function(dom) {
          return nv || (nv = new bvd(dom));
        };


      })(mui);
    </script>
    <script>
        var v = mui.bvd();
        // v.test();
    </script>
    @endif
    <script>
      $(document).ready(function () {
        
        //课程详情
        $('.class_list').each(function(index) {
          $('.class_list').eq(index).find(".list_img").click(function() {
            $(this).find("img").attr("src") == "{{asset('University/images/icon_fanhui.png')}}"  ?  $(this).find("img").attr("src","{{asset('University/images/icon_zhankai@2x.png')}}") : $(this).find("img").attr("src","{{asset('University/images/icon_fanhui.png')}}");
            $(this).next().toggle()
          })
        })

        //答案详情
        $('.topicbox').each(function(index) {
          $('.topicbox').eq(index).find(".ri").click(function() {
            $(this).parent().next().toggle()
          })
        })

        //tab1
        $(".tablea").find(".box:first").show();    //为每个BOX的第一个元素显示   
        $("#oranger li").on("mouseover",function(){ //给a标签添加事件  
          var index=$(this).index();  //获取当前a标签的个数  
          $(this).parent().parent().next().find(".box").hide().eq(index).show(); //返回上一层，在下面查找css名为box隐藏，然后选中的显示  
          $(this).addClass("hover").siblings().removeClass("hover"); //a标签显示，同辈元素隐藏  
        })

        //tab2
        var currentIndex=0;
        $(document).ready(function(){
          $(".tab-head ul li").click(function(){
            var index=$(this).index();
            if(currentIndex!=index) {
              currentIndex=index;
              $(this).removeClass("normal-li").addClass("selected-li");
              $(this).siblings().removeClass("selected-li").addClass("normal-li");
              var contents=$(".tab-content").find(".box2");
              $(contents[index]).show();
              $(contents[index]).siblings().hide();
            }
          });
        });

        //切换文稿
        $(".denlu img").click(function(){ 
            if(this.src.search("University/images/icon_wengao@2x.png")!=-1){ 
                this.src="{{asset('University/images/icon_guanbi@2x.png')}}"; 
                $("#centera").hide();
                $('.wengaobox').show();
            }else{ 
                this.src="{{asset('University/images/icon_wengao@2x.png')}}";
                $("#centera").show();
                $('.wengaobox').hide(); 
            } 
        })

        // $(".vaudio").click(function(){
        //   location.href ="audio.html"
        // })
        //登陆
        $('.onlogin').click(function(){
          var href = $('[name=loginUrl]').val();
          alert('尚未登陆！')
          window.location.href=href
          
        })
        $('.onBuy').click(function(){
          window.location.href="{{url('university/course/buy/id/'.$course->id)}}"
        })
      })
    </script>
@stop