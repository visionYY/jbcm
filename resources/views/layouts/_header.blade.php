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
                <a href="{{$nav['id']==1 ? url('transmit/oneId/'.$nav['id'].'/secId/0') : 'javascript:;'}}" class="dropdown-toggle" data-toggle="dropdown">{{$nav['text']}}
                    @if($nav['nodes'])
                    <b class="caret"></b>
                    @endif
                </a>
                @if($nav['nodes'])
                <ul class="dropdown-menu">
                    @foreach($nav['nodes'] as $nodes)
                    <li><a href="{{url('transmit/oneId/'.$nav['id'].'/secId/'.$nodes['id'])}}">{{$nodes['text']}}</a></li>
                    @endforeach
                   <!--  <li>
                        <a href="../program/program.html">企业纪录片</a>
                    </li> -->
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        <p class="font" onClick="location.href='../search/search.html'"><i class="icon iconfont icon-fangdajing"></i>搜索</p>
    </div>
</nav>