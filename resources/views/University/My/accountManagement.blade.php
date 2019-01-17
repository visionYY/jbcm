<a href="{{url('university/my/editMobile')}}">手机号：{{$user->mobile}}</a>

<a href="{{url('university/my/editPassWord')}}">{{$user->password ? '修改' : '设置'}}密码</a>
