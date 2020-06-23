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
                            <input class="addUser" type="text" placeholder="分类" name="title_name" value="{{$query['title_name'] ?? ''}}" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('catecont/create')}}">添加分类+</a>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="10%" class="tdColor tdC">ID</td>
							<td width="10%" class="tdColor">所属分类</td>
							<td width="10%" class="tdColor">分类标题</td>
                            <td width="10%" class="tdColor">新闻来源</td>
                            <td width="10%" class="tdColor">新闻详情</td>
							<td width="10%" class="tdColor">是否展示</td>
							<td width="10%" class="tdColor">排序</td>
							<td width="10%" class="tdColor">添加时间</td>                            
							<td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
						<tr height="40px" b_id={{$v->id}}>
                            <td>{{$v->id}}</td>
							<td>{{$v->cate_name}}</td>
							<td>{{$v->title_name}}</td>
							<td>{{$v->from}}</td>
							<td>{{$v->text}}</td>
                            <td field="is_show">
								<span class="show" style="cursor:pointer;">{{$v->is_show==1 ? '是' : '否'}}</span>
							</td>
							<td b_id="{{$v->id}}" sort="{{$v->sort}}">
								<span  style="cursor:pointer;" class="changesort" >{{$v->sort}}</span>
							</td>                            
							<td>{{date('Y-m-d H:i:s',$v->time)}}</td>
                            <td>
                                <a href="{{url('catecont/edit')}}?id={{$v->id}}"><img class="operation" src="/style/admin/img/update.png"></a> 
                                <a href="javascript:;"><img id="del" cate_id="{{$v->id}}" class="operation delban"src="/style/admin/img/delete.png"></a>
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
            "{{url('catecont/del')}}",
            {id:id},
            function(res){
                if(res.code==0){
                    var url = "{{url('catecont/index')}}"
                    location.href=url
                }
            }
        ),'json'
    })

	$(document).on('click','.show',function(){
		var _this=$(this)
		var show = _this.text();
		if(show=='是'){
			var new_show='否'
			var value=2
		}else{
			var new_show='是'
			var value=1
		}
		var id = $(this).parents('tr').attr('b_id')
		var field = $(this).parent('td').attr('field')
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('catecont/isshow')}}",
            {id:id,field:field,value:value},
            function(res){
                if(res=='ok'){
					_this.text(new_show).show()
                }
            }
        ),'json'
	})

	$(document).on('click','.changesort',function(){
		var sort = $(this).text()
		$(this).parent().html('<input type="text" class="upd">')
		$('.upd').val('').focus().val(sort)
	})
	$(document).on('blur','.upd',function(){
		var obj = $(this)
		var sort = $(this).val()
		if(!sort){
			return
		}
		var s = $(this).parent('td').attr('sort')
		var id = $(this).parent('td').attr('b_id')
		if(sort == s){
			obj.parent().html('<span class="changesort">'+sort+'</span>')
		}
		var rep=/^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
        if(!rep.test(sort)){
            alert('请写数字')
			return
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
		$.post(
			"{{url('catecont/changesort')}}",
            {id:id,sort:sort},
            function(res){
                if(res.code == 0){
                    obj.parent().html('<span class="changesort">'+sort+'</span>')
					var url="{{url('catecont/index')}}"
                    window.location.href=url
                }
            }
		),'json'
	})
</script>

@endsection



