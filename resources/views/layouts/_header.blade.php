 <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header nav-logo">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
            <span class="sr-only">展开导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src={{asset("Home/images/jiabindaxue_logo.png")}} class="logo" alt="" srcset="">
        </a>
    </div>
    <div class="collapse navbar-collapse nav-con" id="menu">
        <ul class="nav navbar-nav">
            @foreach($data['navig'] as $nav)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$nav['text']}}
                    @if($nav['nodes'])
                    <b class="caret"></b>
                    @endif
                </a>
                @if($nav['nodes'])
                <ul class="dropdown-menu">
                    @foreach($nav['nodes'] as $nodes)
                    <li><a href="../program/program.html">{{$nodes['text']}}</a></li>
                    @endforeach
                   <!--  <li>
                        <a href="../program/program.html">企业纪录片</a>
                    </li> -->
                </ul>
                @endif
            </li>
            @endforeach
            <!-- <li class="dropdown">
                <a href="../index/index.html">首页</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">品牌节目
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../program/program.html">我有嘉宾</a>
                    </li>
                    <li>
                        <a href="../program/program.html">企业纪录片</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">嘉宾大学
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../college/college.html">访学·嘉宾拍</a>
                    </li>
                    <li>
                        <a href="../college/college.html">国际课程</a>
                    </li>
                    <li>
                        <a href="../college/college.html">产业加速课程</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">嘉宾峰会
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../program/guest.html">嘉宾峰会</a>
                    </li>
                    <li>
                        <a href="../program/guest.html">嘉宾榜单</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">导师与学员
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../study/study.html">导师名录</a>
                    </li>
                    <li>
                        <a href="../study/study.html">学员名录</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">关于我们
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../aboutUs/aboutUs.html">公司简介</a>
                    </li>
                    <li>
                        <a href="../aboutUs/aboutUs.html">创始人吴婷</a>
                    </li>
                    <li>
                        <a href="../aboutUs/aboutUs.html">合作伙伴</a>
                    </li>
                    <li>
                        <a href="../aboutUs/aboutUs.html">合作联系</a>
                    </li>
                    <li>
                        <a href="../aboutUs/aboutUs.html">加入我们</a>
                    </li>
                    <li>
                        <a href="../aboutUs/aboutUs.html">寻求报道</a>
                    </li>
                </ul>
            </li> -->
        </ul>
        <p class="font" onClick="location.href='../search/search.html'"><i class="icon iconfont icon-fangdajing"></i>搜索</p>
    </div>
</nav>