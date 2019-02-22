<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微信分享测试</title>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
     <script src="{{asset('Mobile/js/jquery-1.10.1.min.js')}}"></script>
</head>
<body>
    <div style="width:100%;height: 300px;background: #ff0;"></div>

<input type="hidden" id="url" value="{{asset('')}}">
<input type="text" id="signature" value="{{$signPackage['signature']}}">
<input type="text" id="noncestr" value="{{$signPackage['nonceStr']}}">
<input type="text" id="timestamp" value="{{$signPackage['timestamp']}}">
<input type="text" id="appId" value="{{$signPackage['appId']}}">
<script type="text/javascript">
    var timestamp = $('#timestamp').val();
    var noncestr = $('#noncestr').val();
    var signature = $('#signature').val();
    var appId = $('#appId').val();
        wx.config({
            debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: appId, // 必填，公众号的唯一标识
            timestamp: timestamp, // 必填，生成签名的时间戳
            nonceStr: noncestr, // 必填，生成签名的随机串
            signature: signature,// 必填，签名，见附录1
            jsApiList: ['checkJsApi',
            'onMenuShareTimeline',//
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        window.share_config = {
             "share": {
                "imgUrl": "http://www.ijiabin.com/Home/images/wyjb_logo.png",//分享图，默认当相对路径处理，所以使用绝对路径的的话，“http://”协议前缀必须在。
                "desc" : "你在这里能遇到更好的自己",//摘要,如果分享到朋友圈的话，不显示摘要。
                "title" : 'DIDI 只为追寻最好的自己!',//分享卡片标题
                "link": window.location.href,//分享出去后的链接，这里可以将链接设置为另一个页面。
                "success":function(){
                    //分享成功后的回调函数
                },
                'cancel': function () { 
                    // 用户取消分享后执行的回调函数
                }
            }
        }; 
        wx.ready(function () {
            wx.onMenuShareAppMessage(share_config.share);//分享给好友
            wx.onMenuShareTimeline(share_config.share);//分享到朋友圈
            wx.onMenuShareQQ(share_config.share);//分享给手机QQ
        });
</script>
</body>
</html>

 @foreach($reply->rep as $rep)
          @if(Auth::guard('university')->check())
            @if(Auth::guard('university')->user()->id == $reply->user_id)
            <dl class="huifu" >
            @else
            <dl onclick="window.location.href='{{url("university/discussion/reply/cid/$rep->id/id/$discussion->id/source/2/type/1")}}'">
            @endif  
          @else
          <dl onclick="alert('尚未登陆！');window.location.href='{{url("university/login?source=3&yid=".$comment->id)}}'">
          @endif 
            <dd><img src="{{$rep->user_pic}}" alt=""></dd>
            <dt>
              <p class="dt_namet">{{$rep->user_name}}<em>回复</em><span>{{$reply->user_name}}</span></p>
              <p class="dt_con">{{$rep->content}}</p>
            </dt>
          </dl>
        @endforeach


        @if(Auth::guard('university')->check())
        @if(Auth::guard('university')->user()->id == $reply->user_id)
        <dl class="huifu" >
        @else
        <dl onclick="window.location.href='{{url("university/discussion/reply/cid/$reply->id/id/$discussion->id/source/2/type/1")}}'">
        @endif  
       @else
        <dl onclick="alert('尚未登陆！');window.location.href='{{url("university/login?source=3&yid=".$comment->id)}}'">
       @endif 

       /id/{id}/source/{source}/type/{type}

       @foreach($reply->rep as $rep)
          @if(Auth::guard('university')->check())
          <p class="rep_com">{{$rep->user_id != Auth::guard('university')->user()->id ? $rep->user_name : '我'}}回复
            <span>{{$reply->user_name}}：</span>{{$rep->content}}
          </p>
          @else
          <p class="rep_com"><span>{{$rep->user_name}}</span>回复<span>{{$reply->user_name}}：</span>{{$rep->content}}</p>
          @endif
        @endforeach


        @foreach($quiz->answers as $k=>$answer)

        @endforeach

        {{$k}}. {{$answer->title}}

         <div class="testBox">
                      
                      <div class="topicbox">
                        <p class="t_tit"><span>(单选）</span>02. 商业的本质是恒定不变的还是变化的？</p>
                        <input type="radio"  id="radio1"  name="one" /><label class="label" for="radio1">A. 变</label>
                        <input type="radio"  id="radio2"  name="one"/><label class="label" for="radio2">B. 不变</label>
                        <input type="radio"  id="radio3"  name="one"/><label class="label" for="radio3">C. 变又不变</label>                      
                      </div>
                      
                      <!-- <div class="topicbox">
                        <p class="t_tit"><span>(多选）</span>02. 商业的本质是恒定不变的还是变化的？</p>                      
                        <input type="checkbox"  id="checkbox1"/><label class="label" for="checkbox1">A. 变</label>
                        <div class="line"></div>
                        <input type="checkbox"  id="checkbox2"/><label class="label" for="checkbox2">B. 不变</label>
                        <div class="line"></div>
                        <input type="checkbox"  id="checkbox3"/><label class="label" for="checkbox3">C. 变又不变</label>
                      </div>
                      <div class="topicbox">
                        <p class="t_tit"><span>(单选）</span>01. 商业的本质是恒定不变的还是变化的？</p>
                        <input type="radio"  id="radio4"  name="two" disabled/><label class="label" for="radio4">A. 变</label>
                        <input type="radio"  id="radio5"  name="two" disabled/><label class="label" for="radio5" >B. 不变</label>
                        <input type="radio"  id="radio6"  name="two" checked/><label class="label" for="radio6">C. 变又不变</label> 
                        <div class="analysis">
                          <div class="ana_tit">
                            <p class="le">正确答案：<span>b</span></p>
                            <p class="ri">显示解析</p>
                          </div>
                          <div class="ana_con">题目解析：人力资源管例商业案例课商业案例0商0人力管
                              例商业案例课商业案例0商人力资源管0例商业案例课案例
                              0商人力资源管例商业案例商课商业案例0商。</div>
                        </div>                     
                      </div>
                      <div class="topicbox">
                        <p class="t_tit"><span>(多选）</span>02. 商业的本质是恒定不变的还是变化的？</p>                      
                        <input type="checkbox"  id="checkbox4" checked/><label class="label" for="checkbox4">A. 变</label>
                        <div class="line"></div>
                        <input type="checkbox"  id="checkbox5" checked/><label class="label" for="checkbox5">B. 不变</label>
                        <div class="line"></div>
                        <input type="checkbox"  id="checkbox6" disabled/><label class="label" for="checkbox6">C. 变又不变</label>
                        <div class="analysis">
                          <div class="ana_tit">
                            <p class="le">正确答案：<span>b</span></p>
                            <p class="ri">显示解析</p>
                          </div>
                          <div class="ana_con">题目解析：人力资源管例商业案例课商业案例0商0人力管
                              例商业案例课商业案例0商人力资源管0例商业案例课案例
                              0商人力资源管例商业案例商课商业案例0商。</div>
                        </div>    
                      </div> -->
                      <button class="sub">提交</button>
                    </div>

                    @foreach($content->quizs as $quiz)
                     @endforeach