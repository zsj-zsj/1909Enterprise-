@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">用户管理</a>&nbsp;-</span>&nbsp;修改
			</div>
		</div>
		<div class="page ">
            <form action="{{url('admin/user_upd')}}" id="form" method="post">
                    @csrf
                    <input type="hidden" value="{{$data->user_id}}" name="user_id">
            <div class="baBody">
                <div class="bbD">
                    角色：
                   <select class="input3" name="role_id" >
                        @foreach ($role as $v)
                        <option  value="{{$v->role_id}}" {{$data->role_id==$v->role_id ? 'selected' : ''}} >{{$v->role_name}}</option>        
                        @endforeach
                   </select>
                </div>
                <div class="bbD">
                    用户名：<input type="text" value="{{$data->user_name}}" class="input1" name="user_name" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes"  id="add" href="#">修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
    </div>

@endsection