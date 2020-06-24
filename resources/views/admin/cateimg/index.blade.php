@extends('admin.layout')

@section('title', '分类展示')

@section('content')

	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;分类管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form>
						<div class="cfD">
                            <input class="addUser" type="text" placeholder="名称" name="name" value="{{$query['name'] ?? ''}}" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('cateimg/create')}}">添加分类图片+</a>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="10%" class="tdColor tdC">ID</td>
							<td width="10%" class="tdColor">名称</td>
							<td width="10%" class="tdColor">地址</td>
                            <td width="10%" class="tdColor">图片</td>
							<td width="10%" class="tdColor">显示位置</td>
							<td width="10%" class="tdColor">添加时间</td>                            
							<td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
						<tr height="40px">
                            <td>{{$v->i_id}}</td>
							<td>{{$v->name}}</td>
							<td>{{$v->url}}</td>
							<td bgcolor="red"> <img src="{{$v->img}}" width="100px" height="65px"> </td>
                            <td>{{$v->know==1 ? '服务指南' : '在线服务'}}</td>                  
							<td>{{date('Y-m-d H:i:s',$v->time)}}</td>
                            <td>
                                <a href="{{url('cateimg/edit')}}?id={{$v->i_id}}"><img class="operation" src="/style/admin/img/update.png"></a> 
                                <a href="javascript:;"><img id="del" i_id="{{$v->i_id}}"  class="operation delban"src="/style/admin/img/delete.png"></a>
                            </td>
                        </tr>
                        @endforeach
					</table>
					<ul class="pagination">
                        {{$data->appends($query)->links()}}
                    </ul>
				</div>
			</div>
		</div>
    </div>

<script>
    $(document).on('click','#del',function(){
        var id =$(this).attr('i_id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('cateimg/del')}}",
            {id:id},
            function(res){
                if(res.code==0){
                    var url = "{{url('cateimg/index')}}"
                    location.href=url
                }
            }
        ),'json'
    })
</script>

@endsection



