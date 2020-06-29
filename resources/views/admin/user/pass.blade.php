@extends('admin.layout')

@section('title', '分类')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类详情管理</a>&nbsp;-</span>&nbsp;分类详情添加
			</div>
		</div>
		<div class="page ">
            <div class="baBody">
                <form action="{{url('admin/doupdpass')}}" id="form" method="post">
                    @csrf
                    <div class="bbD">
                        用户名：<input type="text" name="user_name" class="input3" />
                    </div>
                    <div class="bbD">
                        新密码：<input type="password" name="pwd" class="input3" />
                    </div>
                    <div class="bbD">
                        确认新密码：<input type="password" name="pwd2" class="input3" />
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes"  id="add" href="#">添加</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </form>
            </div>
		</div>
    </div>

@endsection