@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">权限管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
            <form action="{{url('admin/permission_add')}}" id="form" method="post">
                    @csrf
            <div class="baBody">
                <div class="bbD">
                    权限名称：<input type="text" class="input1" name="permission_name" />
                </div>
                <div class="bbD">
                    可访问路径：<input type="text" class="input1" name="url" />
                </div>
                {{-- <div class="bbD">
                    <select name="parent_id" id="" class="input3">
                        <option value="0">顶级权限</option>
                        @foreach ($perm as $v)
                            <option value="{{$v->permission_id}}">{{$v->permission_name}}</option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- <div class="bbD">
                        <select name="parent_id" id="" class="input3">
                            <option value="0">顶级权限</option>
                            @foreach ($perm as $v)
                                <option value="{{$v->permission_id}}">{{$v->permission_name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="add" href="#">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
	</div>
    @endsection