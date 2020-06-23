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
                            <input class="addUser" type="text" placeholder="分类" name="cate_name" value="{{$query['cate_name'] ?? ''}}" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('cate/create')}}">添加分类+</a>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="10%" class="tdColor tdC">ID</td>
							<td width="10%" class="tdColor">分类名称</td>
							<td width="10%" class="tdColor">是否显示</td>
							<td width="10%" class="tdColor">添加时间</td>
							<td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
						<tr height="40px" cate_id="{{$v->cate_id}}">
							<td>{{$v->cate_id}}</td>
							<td>{{$v->cate_name}}</td>
							<td field="is_show">
								<span style="cursor:pointer;" class="show">{{$v->is_show==1 ? '是' : '否'}}</span>
							</td>
							<td>{{date('Y-m-d H:I:s',$v->addtime)}}</td>
                            <td>
                                <a href="{{url('cate/edit')}}?id={{$v->cate_id}}"><img class="operation" src="/style/admin/img/update.png"></a> 
                                <a href="javascript:;"><img id="del" cate_id="{{$v->cate_id}}" class="operation delban"src="/style/admin/img/delete.png"></a>
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
        var id =$(this).attr('cate_id')
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('cate/del')}}",
			{id:id},
			function(res){
				if(res.code==0){
					var url="{{url('cate/index')}}"
					location.href=url
				}else{
					alert(res.msg)
				}
			}
        ),'json'
    })

	$(document).on('click','.show',function(){
		var _this=$(this)
		var show = _this.text()
		if(show=='是'){
			var new_show='否'
			var value=2
		}else{
			var new_show='是'
			var value=1
		}
		var field = $(this).parent('td').attr('field')
		var id = $(this).parents('tr').attr('cate_id')
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
		$.post(
			"{{url('cate/isshow')}}",
			{value:value,cate_id:id,field:field},
			function(res){
				if(res == 'ok'){
					_this.text(new_show).show()
				}
			}
		),'json'
	})

</script>

@endsection



