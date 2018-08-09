@extends('layouts.admin')
@section('title','广告修改')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>广告修改</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form action={{url('admin/advertising/'.$data->id)}} class="form-horizontal m-t" id="signupForm" method="POST" enctype="multipart/form-data">
                            @include('layouts.admin_error')
                            <!-- 标题： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标题：</label>
                                <div class="col-sm-8">
                                    <input  name="title" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{$data->title}}">
                                </div>
                            </div>
                            <!-- 视频地址 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">视频地址：</label>
                                <div class="col-sm-8">
                                    <input name="video" class="form-control" type="text" value="{{$data->video}}">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 非1号位可不填</span>
                                </div>
                            </div>
                          
                             <!-- 链接地址： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">链接地址：</label>
                                <div class="col-sm-8">
                                    <input name="href" class="form-control" type="text" value="{{$data->href}}">
                                    <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span> -->
                                </div>
                            </div>
                            <!-- 位置 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">位置：</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="location">
                                        @foreach(config('hint.location') as $k => $v)
                                        <option value="{{$k}}" {{$data->location == $k ? 'selected' : ''}}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span> -->
                                </div>
                            </div>
                            
                            <!-- 封面 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">封面：</label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> 选择图片</button>
                                </div>
                            </div>
                             <!-- 封面 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <img width="100px;" src="{{$data->cover}}" id="cover">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                             <input type="hidden" name="old_cover" value="{{$data->cover}}">
                                            <input type="hidden" name="_method" value="put"/>
                                            <input type="hidden" name="cover">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href={{url("admin/advertising")}} >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin_js')
    <script src={{asset("Admin/js/plugins/layer/laydate/laydate.js")}}></script>

    <script src={{asset("Admin/js/plugins/chosen/chosen.jquery.js")}}></script>
    <script src={{asset("Admin/js/demo/form-advanced-demo.min.js")}}></script>
    @include('layouts.admin_picpro')
    <script type="text/javascript">
        //图片比例 814:513
        var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [271, 171],
        outputSize: [407, 256],
        file: "#file",
        view: "#view",
        ok: "#clipBtn",
        loadStart: function() {
            console.log("照片读取中");
        },
        loadComplete: function() {
            console.log("照片读取完成");
        },
        clipFinish: function(dataURL) {
            // console.log(dataURL);
            $('#cover').attr('src',dataURL);
            $('[name=cover]').attr('value',dataURL);
        }
    });
    </script>
@stop
