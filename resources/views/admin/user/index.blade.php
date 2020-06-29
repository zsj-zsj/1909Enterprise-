@extends('admin.layout')

@section('title', '展示导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">权限管理</a>&nbsp;-</span>&nbsp;展示
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
                            <td width="10%" class="tdColor">用户名</td>
                            <td width="10%" class="tdColor">角色</td>
                            <td width="10%" class="tdColor">操作</td>
                        </tr>
                        @foreach ($data as $v)
                        <tr >
                            <td>{{$v->user_id}}</td>
                            <td>{{$v->user_name}}</td>
                            <td>{{$v->role_name}}</td>
                            <td>
                                <a href="{{url('admin/user_edit')}}?id={{$v->user_id}}"><img class="operation" src="/style/admin/img/update.png"></a> 
                                <a href="javascript:;"><img id="del" uid="{{$v->user_id}}"  class="operation delban"src="/style/admin/img/delete.png"></a>    
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
        var id = $(this).attr('uid')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('admin/userdel')}}",
            {id:id},
            function(res){
                if(res==0){
                    var url = "{{url('/admin/indexuser')}}"
                    location.href=url
                }
            }
        ),'json'
    })
</script>    
@endsection
