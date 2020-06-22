@extends('admin.style')

@section('title', '')

@section('content')

	<!-- 头部 -->
	<div class="head">
		<div class="headL">
			<img class="headLogo" src="/style/admin/img/headLogo.png" />
		</div>
		<div class="headR">
			<p class="p1">
				欢迎，
				
			</p>
			<p class="p2">
				<a href="#" class="resetPWD">重置密码</a>&nbsp;&nbsp;<a
					href="{:U('Admin/Index/exit')}" class="goOut">退出</a>
			</p>
		</div>
		<!-- onclick="{if(confirm(&quot;确定退出吗&quot;)){return true;}return false;}" -->
	</div>

	<div class="closeOut">
		<div class="coDiv">
			<p class="p1">
				<span>X</span>
			</p>
			<p class="p2">确定退出当前用户？</p>
			<P class="p3">
				<a class="ok yes" href="#">确定</a><a class="ok no" href="#">取消</a>
			</p>
		</div>
	</div>