@extends('admin.layout')

@section('title', '展示导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航栏管理</a>&nbsp;-</span>&nbsp;展示
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="conform">
					<form>
						<div class="cfD">
							<input class="addUser" type="text" placeholder="导航" name="name" value="{{$query['name'] ?? ''}}" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('navigation/create')}}">添加导航+</a>
						</div>
					</form>
				</div>
				<!-- topic表格 显示 -->
				<div class="conShow" id="vue">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="10%" class="tdColor tdC">ID</td>
							<td width="10%" class="tdColor">导航名称</td>
							<td width="10%" class="tdColor">是否显示</td>
							<td width="10%" class="tdColor">排序</td>
                            <td width="10%" class="tdColor">地址</td>
                            <td width="10%" class="tdColor">添加时间</td>
							<td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
						<tr b_id={{$v->id}}>
							<td>{{$v->id}}</td>
							<td>{{$v->name}}</td>
                            {{-- <td>@if ($v->hidden==1) 是  @else 否 @endif</td> --}}
                            <td field='hidden'>
                                <span class="change" style="cursor:pointer;">{{$v->hidden==1 ? '是' : '否'}}</span>    
                            </td>
                            <td b_id="{{$v->id}}" sort="{{$v->sort}}">
                                <span class="changesort"  style="cursor:pointer;">{{$v->sort}}</span>
                            </td>
                            <td>{{$v->url}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->time)}}</td>                           
                            <td>
                                <a href="{{url('navigation/edit')}}/?id={{$v->id}}"><img class="operation"src="/style/admin/img/update.png"></a> 
                                <a href=""><img id="del" b_id="{{$v->id}}" class="operation delban"src="/style/admin/img/delete.png"></a>
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
@endsection

<script type="text/javascript" src="/style/admin/js/jquery.min.js"></script>
<script>
    $(document).on('click','.changesort',function(){
        var sort=$(this).text()
        $(this).parent().html('<input type="text" class="upd">')
        $('.upd').val('').focus().val(sort)
    })
    $(document).on('blur','.upd',function(){
        var obj=$(this)
        var sort = $(this).val()
        if(!sort){
            return
        }
        var id = $(this).parent('td').attr('b_id')
        var s = $(this).parent('td').attr('sort')
        if(sort==s){
            obj.parent().html('<span class="changesort">'+sort+'</span>')
            return
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
            "{{url('navigation/changesort')}}",
            {id:id,sort:sort},
            function(res){
                if(res.code == 0){
                    obj.parent().html('<span class="changesort">'+sort+'</span>')
                    window.location.href='index'
                }
            }
        ),'json'
    })


    $(document).on('click','#del',function(){
        var id = $(this).attr('b_id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        if(confirm('确定删除吗')){
            $.post(
                "{{url('navigation/del')}}",
                {id:id},
                function(res){
                    if(res.code==0){
                        alert(res.msg)
                    }
                }
            ),'json'
        }
    })

    $(document).on('click','.change',function(){
        var _this=$(this);
        var hidden=_this.text()
        if(hidden=='是'){
            var new_hidden ='否'
            var value=2
        }else{
            var new_hidden ='是'
            var value=1
        }
        var field = $(this).parent('td').attr('field')
        var b_id = $(this).parents('tr').attr('b_id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('navigation/change')}}",
            {value:value,field:field,id:b_id},
            function(res){
                if(res=='ok'){
                    _this.text(new_hidden).show();
                }
            }
        )
    })
</script>
