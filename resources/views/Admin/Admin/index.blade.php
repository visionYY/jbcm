<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_foo_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:03 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>用户管理</title>
    <meta name="keywords" content="用户管理">
    <meta name="description" content="用户管理">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>管理员列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">选项 01</a>
                                </li>
                                <li><a href="#">选项 02</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="adminAdd" class="btn btn-primary J_menuItem">添加管理员</a>
                        </div>
                        @include('layouts.admin_error')
                         <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th >ID</th>
                                    <th>用户名</th>
                                    <th>昵称</th>
                                    <th>电话</th>
                                    <th>邮箱</th>
                                    <th>最后登陆IP</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($list as $v)
                                <tr class="gradeC">
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->admin_name}}</td>
                                    <td>{{$v->nickname}}</td>
                                    <td class="center">{{$v->mobile}}</td>
                                    <td class="center">{{$v->email}}</td>
                                    <td class="center">{{$v->login_ip}}</td>
                                    <td class="center">
                                        @if($v->status == 1)
                                            <span class="label label-info">正常</span>
                                        @else
                                            <span class="label label-danger">禁用</span>
                                        @endif
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="userDetail/id/{{$v->id}}">详情</a></li>
                                                <li><a href="userMod/id/{{$v->id}}" class="font-bold">修改</a></li>
                                                <li><a href="forbidden/id/{{$v->id}}">禁用</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:;" onclick="if(confirm('删除后不可恢复，确定删除吗？')) location.href='userDel/id/{{$v->id}}'">删除</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php echo $list->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$(".footable").footable();$(".footable2").footable()});
    </script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


</html>
