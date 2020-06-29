@extends('admin.style')

@section('title', '')

@section('content')

	<!-- 头部 -->
	<div class="head">
		<div class="headL">
			<img class="headLogo" src="/style/admin/img/headLogo.png" />
		</div>
		{{-- 欢迎 <b style="color:red"> {{ Session::get('user') }}</b>登录 --}}
	</div>
