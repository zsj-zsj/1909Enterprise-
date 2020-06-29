@extends('admin.layout')

@section('title', '展示导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色管理</a>&nbsp;-</span>&nbsp;展示
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<!-- topic表格 显示 -->
				<div class="conShow" id="vue">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="10%" class="tdColor tdC">ID</td>
                            <td width="10%" class="tdColor">角色名称</td>
                            <td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
                        <tr >
                            <td>{{$v->role_id}}</td>
                            <td>{{$v->role_name}}</td>
                            <td>
                                <a href="{{url('admin/role_edit')}}?id={{$v->role_id}}"><img class="operation" src="/style/admin/img/update.png"></a> 
                                <a href="javascript:;"><img id="del" role_id="{{$v->role_id}}" class="operation delban"src="/style/admin/img/delete.png"></a>    
                            </td>                        
                        </tr>
                        @endforeach
                    </table>
                    <ul class="pagination">
                        {{-- {{$data->appends($query)->links()}} --}}
                    </ul>				
				</div>
			</div>
		</div>
    </div>

<script>
    $(document).on('click','#del',function(){
        var id = $(this).attr('role_id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('admin/role_del')}}",
            {id:id},
            function(res){
                if(res==0){
                    var url = "{{url('/admin/role_index')}}"
                    location.href=url
                }
            }
        ),'json'
    })
</script>

@endsection
