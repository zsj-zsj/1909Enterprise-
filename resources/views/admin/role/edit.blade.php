@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色管理</a>&nbsp;-</span>&nbsp;修改
			</div>
		</div>
		<div class="page ">
            <form action="{{url('admin/role_upd')}}" id="form" method="post">
                    @csrf
                    <input type="hidden" name="role_id" value="{{$data->role_id}}">
            <div class="baBody">
                <div class="bbD">
                    角色名称：<input type="text" value="{{$data->role_name}}" class="input1" name="role_name" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="add" href="#">修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
	</div>
    @endsection