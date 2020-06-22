@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航栏管理</a>&nbsp;-</span>&nbsp;修改
			</div>
		</div>
		<div class="page ">
            <form  id="form" action="{{url('navigation/upd')}}" method="post">
                    @csrf
            <div class="baBody">
                <div class="bbD">
                             <input type="hidden" value="{{$data->id}}" name="id">
                    导航名称：<input type="text" class="input1" value="{{$data->name}}" name="name" />
                </div>
                <div class="bbD">
                    链接地址：<input type="text" class="input1"  value="{{$data->url}}" name="url" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" name="hidden" {{$data->hidden==1 ? 'checked' : '' }} value="1"/>是</label>
                             <label><input type="radio" name="hidden" {{$data->hidden==2 ? 'checked' : '' }} value="2"/>否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"  value="{{$data->sort}}"  name="sort" type="text" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="upd" href="#">修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
	</div>
    @endsection