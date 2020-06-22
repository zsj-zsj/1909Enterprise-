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
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin03.png" /><img class="icon2"
						src="style/admin/img/coin04.png" /> 网站管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="../user.html"
						target="main">管理员管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin05.png" /><img class="icon2"
						src="style/admin/img/coin06.png" /> 公共管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="../banner.html"
						target="main">广告管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks" href="../opinion.html"
						target="main">意见管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin07.png" /><img class="icon2"
						src="style/admin/img/coin08.png" /> 会员管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../vip.html" target="main"
						class="cks">会员管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin10.png" /><img class="icon2"
						src="style/admin/img/coin09.png" /> 行家管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../connoisseur.html"
						target="main" class="cks">行家管理</a><img class="icon5"
						src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin11.png" /><img class="icon2"
						src="style/admin/img/coin12.png" /> 话题管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../topic.html" target="main"
						class="cks">话题管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin14.png" /><img class="icon2"
						src="style/admin/img/coin13.png" /> 心愿管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../wish.html" target="main"
						class="cks">心愿管理</a><img class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin15.png" /><img class="icon2"
						src="style/admin/img/coin16.png" /> 约见管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../appointment.html"
						target="main" class="cks">约见管理</a><img class="icon5"
						src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coin17.png" /><img class="icon2"
						src="style/admin/img/coin18.png" /> 收支管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../balance.html"
						target="main" class="cks">收支管理</a><img class="icon5"
						src="style/admin/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="style/admin/img/coinL1.png" /><img class="icon2"
						src="style/admin/img/coinL2.png" /> 系统管理<img class="icon3"
						src="style/admin/img/coin19.png" /><img class="icon4"
						src="style/admin/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a href="../changepwd.html"
						target="main" class="cks">修改密码</a><img class="icon5"
						src="style/admin/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="style/admin/img/coin111.png" /><img class="coin22"
						src="style/admin/img/coin222.png" /><a class="cks">退出</a><img
						class="icon5" src="style/admin/img/coin21.png" />
				</dd>
			</dl>

		</div>

	</div>

@endsection