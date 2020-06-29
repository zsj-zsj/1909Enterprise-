@extends('admin.style')

@section('title', '')

@section('content')

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="{{url('main')}}" target="main"><div class="line">
					<img src="style/admin/img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="style/admin/img/coin01.png" /><img class="icon2"src="style/admin/img/coin02.png" />
				首页<img class="icon3" src="style/admin/img/coin19.png" /><img class="icon4" src="style/admin/img/coin20.png" /></dt>
		</dl> -->



		
		
		{{-- <dl class="system_log">
			@foreach ($perm as $v)
			<dt>
				<img class="icon1" src="style/admin/img/coin03.png" /><img class="icon2"
					src="style/admin/img/coin04.png" />{{$v['permission_name']}} <img class="icon3"
					src="style/admin/img/coin19.png" /><img class="icon4"
					src="style/admin/img/coin20.png" />		
			</dt>
				@foreach ($v['child'] as $vv)
				<dd>
						
						<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
							src="style/admin/img/coin222.png" /><a class="cks" href=""
							target="main">{{$vv['permission_name']}}</a><img class="icon5" src="style/admin/img/coin21.png" />
							
							
				</dd>
				@endforeach
			@endforeach 
			
		</dl> --}}
		
				

			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin03.png" /><img class="icon2"
						src="style/admin/img/coin04.png" /> 导航栏管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('navigation/create')}}"
						target="main">添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('navigation/index')}}"
						target="main">展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin05.png" /><img class="icon2"
						src="style/admin/img/coin06.png" /> 分类管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('cate/create')}}"
						target="main">分类添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('cate/index')}}"
						target="main">分类展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin05.png" /><img class="icon2"
						src="style/admin/img/coin06.png" /> 分类详情管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('catecont/create')}}"
						target="main">分类详情添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('catecont/index')}}"
						target="main">分类详情展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin05.png" /><img class="icon2"
						src="style/admin/img/coin06.png" /> 分类图片管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('cateimg/create')}}"
						target="main">分类图片添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('cateimg/index')}}"
						target="main">分类图片展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin05.png" /><img class="icon2"
						src="style/admin/img/coin06.png" /> 留言管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="{{url('messagelist')}}"
						target="main">留言列表</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin07.png" /><img class="icon2"
						src="style/admin/img/coin08.png" /> 角色管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/role_cre')}}" target="main"
						class="cks">添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/role_index')}}" target="main"
						class="cks">展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin07.png" /><img class="icon2"
						src="style/admin/img/coin08.png" />权限管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/permission_cre')}}" target="main"
						class="cks">添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/permission_index')}}" target="main"
						class="cks">展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin07.png" /><img class="icon2"
						src="style/admin/img/coin08.png" />角色权限管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/role_perm_cre')}}" target="main"
						class="cks">添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/role_perm_index')}}" target="main"
						class="cks">展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin07.png" /><img class="icon2"
						src="style/admin/img/coin08.png" />添加用户<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/reg')}}" target="main"
						class="cks">添加</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/indexuser')}}" target="main"
						class="cks">展示</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coinL1.png" /><img class="icon2"
						src="style/admin/img/coinL2.png" /> 账号管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('admin/updpass')}}"
						target="main" class="cks">修改密码</a><img class="icon5"
						src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="{{url('quit')}}" class="cks">退出</a><img
						class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>

		</div>

	</div>

@endsection
