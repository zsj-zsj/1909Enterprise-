@extends('admin.layout')

@section('title', '分类')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类管理</a>&nbsp;-</span>&nbsp;修改
			</div>
		</div>
		<div class="page ">
            <form action=""  id="formdata" method="post">
                    @csrf
                    <input type="hidden" value="{{$data->cate_id}}" name="cate_id">
            <div class="baBody">
                <div class="bbD">
                    分类名称：<input type="text" class="input1" value="{{$data->cate_name}}" name="cate_name" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" name="is_show" {{$data->is_show==1 ? 'checked' : '' }} value="1"/>是</label>
                             <label><input type="radio" name="is_show" {{$data->is_show==2 ? 'checked' : '' }} value="2"/>否</label>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button type="button" class="btn_ok btn_yes" id="add" href="#" >修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
    </div>
    

<script type="text/javascript" src="/style/admin/js/jquery.min.js"></script>
<script>
    $(document).on('click','#add',function(){
        var data = $("#formdata").serialize()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('cate/upd')}}",
            data,
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
</script>

@endsection

