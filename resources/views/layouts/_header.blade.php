<nav>
    <ul>
        <li><img src="{{asset('Home/images/jiabindaxue_logo.png')}}" alt=""></li>
        @foreach($data['navig'] as $nav)
        <li>
            @if($nav['nodes'])
            <a href="javascript:;">{{$nav['text']}}<b class="triangle"></b></a>
            <ul>
             @foreach($nav['nodes'] as $nodes)
                <li><a href="{{url('transmit/oneId/'.$nav['id'].'/secId/'.$nodes['id'])}}">{{$nodes['text']}}</a></li>
             @endforeach   
            </ul>
            @else
            <a href="{{url('/')}}">首页</a>
            @endif
                
        </li>
         @endforeach
    </ul>
    <p class="font" onClick="location.href='../search/search.html'"><i class="icon iconfont icon-fangdajing"></i>搜索</p>
</nav>

