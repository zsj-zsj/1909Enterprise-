@extends('admin.layout')

@section('title', '添加导航')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航栏管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
            <form action="" id="form" method="post">
                    @csrf
            <div class="baBody">
                <div class="bbD">
                    导航名称：<input type="text" class="input1" name="name" />
                </div>
                <div class="bbD">
                    链接地址：<input type="text" class="input1" name="url" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" name="hidden" checked="checked" value="1"/>是</label>
                                <label><input type="radio" name="hidden" value="2"/>否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2" name="sort" type="text" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="add" href="#">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
	</div>
    @endsection

<script type="text/javascript" src="/style/admin/js/jquery.min.js"></script>
<script>
    $(document).on('click','#add',function(){
        var data = $("#form").serialize()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('navigation/story')}}",
            data,
            function(res){
                if(res.code==0){
                    alert(res.msg)
                    window.location.href=res.url
                }else{
                    alert(res,msg)
                }
            }
        ),'json'
    })
</script>