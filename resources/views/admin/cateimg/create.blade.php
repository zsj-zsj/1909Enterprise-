@extends('admin.layout')

@section('title', '分类')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类图片管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
            <form action="" method="post">
                    @csrf
            <div class="baBody">
                <div class="bbD">
                    名称：<input type="text" class="input1" name="name" />
                </div>
                <div class="bbD">
                    地址：<input type="text" class="input1" name="url" />
                </div>
                <div class="bbD">
                    <input type="file" id="file" multiple="true" name="img" />
                    <img src="" id="img"  width="200px" height="200px" alt="">
                </div>
                <div class="bbD">
                    显示位置：<label><input type="radio" name="know" value="1"/>服务指南</label>
                             <label><input type="radio" name="know" value="2"/>在线服务</label>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button type="button" class="btn_ok btn_yes" id="add" href="#" >提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
            </form>
		</div>
    </div>
    
<script>
    $("#file").uploadify({ 
        'swf' : "/style/admin/js/uploadify/uploadify.swf",
        'uploader' :  '/cateimg/upload',
        'buttonText' : "上传图片",
        onUploadSuccess:function(msg,path,bol){
            $("#img").attr('src',path);
        } 
    })
    $(document).on('click','#add',function(){
        var name = $("input[name='name']").val()
        var url = $("input[name='url']").val()
        var know = $("input[name='know']:checked").val();
        var img =$("#img").attr('src');
        
        var data = {
            name:name,url:url,know:know,img:img
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type : "post",
            data : data,
            url : "{{url('cateimg/story')}}",
            dataType : "json",
            success : function(res){
                if(res.code == 0 ){
                    var url = "{{url('cateimg/index')}}"
                    location.href=url
                }
            }
        })
    })
</script>

@endsection

