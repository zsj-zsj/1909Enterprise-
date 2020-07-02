@extends('admin.layout')

@section('title', '展示导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">留言列表</a>&nbsp;-</span>&nbsp;展示
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
							<td width="10%" class="tdColor tdC">表情</td>
							<td width="10%" class="tdColor">姓名</td>
							<td width="10%" class="tdColor">内容</td>
                            <td width="10%" class="tdColor">留言时间</td>
						</tr>
						@foreach ($data as $v)
						<tr >
							<td>{{$v->m_id}}</td>
							<td> <img src="/style/images/{{$v->face}}" > </td>
							<td>{{$v->name}}</td>
							<td>{{$v->text}}</td>
							<td>{{date('Y-m-d H:i:s',$v->time)}}</td>                          
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
@endsection
