<!-- 导航 -->
<div data-role="panel" id="myPanel"> 
  <div class="pagelist">
    @foreach($data['navig'] as $nav)
      @if($nav['nodes'])
        <h4 class="pagetit">{{$nav['text']}}</h4>
        <ul class="test">
          @foreach($nav['nodes'] as $nodes)
            <li><a href="{{url('mobile/transmit/oneId/'.$nav['id'].'/secId/'.$nodes['id'])}}">{{$nodes['text']}}</a></li>
          @endforeach
        </ul>
      @else
        <h4 class="pagetit"><a href="{{url('mobile/transmit/oneId/'.$nav['id'].'/secId/0')}}"">{{$nav['text']}}</a></h4>
      @endif
    @endforeach
  </div>
</div> 

<div data-role="header" class="ui-header">
  <a href="#" id="pagehide"><i class="icon iconfont icon-mulu"></i></a>
  <b><img src="{{asset('Mobile/images//jiabindaxue_logo.png')}}" alt=""></b>
  <a href="search.html"><i class="icon iconfont icon-sousuo search"></i></a>
</div>