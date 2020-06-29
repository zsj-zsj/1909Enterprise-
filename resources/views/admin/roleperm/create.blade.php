@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色权限管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
            <form action="{{url('admin/role_perm_add')}}" id="form" method="post">
                    @csrf
            <div class="baBody">
                <div class="bbD">
                    角色：
                   <select class="input3" id="sel" name="role_id" >
                        <option value="">选择角色</option>
                        @foreach ($role as $v)
                        <option  value="{{$v->role_id}}">{{$v->role_name}}</option>        
                        @endforeach
                   </select>
                </div>
                <div class="bbD">
                    权限 <br>
                    @foreach ($perm as $v)
                    <input type="checkbox" name="permission_id[]" id="box" value="{{$v->permission_id}}">{{$v->permission_name}}&nbsp;
                    @endforeach
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes"  id="add" href="#">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
    </div>
    
{{-- <script>
    $(document).on('click','#add',function(){
        var sel = $("#sel ").val();
        var arr=[]
        $.each($("input:checkbox:checked"),function(){
            arr.push($(this).val())
        })
        var data={
            sel:sel,arr:arr
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('admin/role_perm_add')}}",
            data,
            function(){

            }
        ),'json'
    })
</script> --}}

@endsection