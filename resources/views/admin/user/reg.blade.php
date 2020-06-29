<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="/style/admin/css/public.css" />
<link rel="stylesheet" type="text/css" href="/style/admin/css/page.css" />
<script type="text/javascript" src="/style/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/style/admin/js/public.js"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="/style/admin/img/logLOGO.png" />
	</div>
	<!-- 登录页面头部结束 -->

    <!-- 登录body -->
    <form action="" method="post" id="form">
        @csrf
        <div class="logDiv">
            <img class="logBanner" src="/style/admin/img/logBanner.png" />
            <div class="logGet">
                <!-- 头部提示信息 -->
                <div class="logD logDtip">
                    <a href="{{url('adlogin')}}"><p class="p3">已有账号去登录</p></a>
                </div>
                <!-- 输入框 -->
                <div class="lgD">
                    <img class="img1" src="/style/admin/img/logName.png" />
                    <input type="text" name="user_name" placeholder="输入用户名" />
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:red">选择角色：</b>
                    @foreach ($role as $v)
                        <input type="checkbox" name="role_id[]" value="{{$v->role_id}}"> {{$v->role_name}}
                    @endforeach
                </div>
                <div class="lgD">
                    <img class="img1" src="/style/admin/img/logPwd.png" />
                    <input type="password" name="pwd" placeholder="输入用户密码" />
                </div>  
                <div class="logC">
                    <button class="btn_ok btn_yes" type="button" id="add" href="#">注册</button>
                </div>
            </div>
        </div>
    </form>
	
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：南京设易网络科技有限公司</p>
		<p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>

<script>
    $(document).on('click','#add',function(){
        var data = $("#form").serialize()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('admin/doreg')}}",
            data,
            function(res){
                if(res.code==0){
                    var url= "{{url('adlogin')}}"
                    alert(res.msg)
                    location.href=url
                }
            }
        ),'json'
    })
</script>