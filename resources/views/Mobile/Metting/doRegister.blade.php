<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
  <title>我的奖品</title>
  <link rel="stylesheet" type="text/css" href="{{asset('Mobile/metting/css/reset.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Mobile/metting/css/log.css')}}">
  <script>
    (function (doc, win) {
      var docEl = doc.documentElement,
          resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
          recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            docEl.style.fontSize = 5 * (clientWidth / 100) + 'px';
          };
  
      if (!doc.addEventListener) return;
      win.addEventListener(resizeEvt, recalc, false);
      doc.addEventListener('DOMContentLoaded', recalc, false);
    })(document, window);
  </script>
</head>
<body>
  <div class="wrapper">
    <p class="line"><img src="{{asset($award->pic)}}" alt=""><img class="wedded" src="{{asset('Mobile/metting/images/wedded.png')}}" alt=""></p>
    <button id="btn-lq" onclick="window.location.href='{{url('mobile/metting/myAward/uid/'.$award->uid)}}'">查看奖品详情</button>
  </div>
</body>
</html>