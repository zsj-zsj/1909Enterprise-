@extends('admin.layout')

@section('title', '分类')

@section('content')
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/style/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类详情管理</a>&nbsp;-</span>&nbsp;分类详情添加
			</div>
		</div>
		<div class="page ">
            <div class="baBody">
                <form action="" id="form" method="post">
                    <div class="bbD">
                        所属分类：
                        <select class="input3" name="cate_id">
                            <option value="">请选择</option>
                            @foreach ($category as $v)
                            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="bbD">
                        新闻标题：<input type="text" name="title_name" class="input3" />
                    </div>
                    <div class="bbD">
                        新闻来源：<input type="text" name="from" class="input3" />
                    </div>
                    <div class="bbD">
                        新闻内容：
                        <div class="btext2">
                            <textarea class="text2" name="text"></textarea>
                        </div>
                    </div>
                    <div class="bbD">
                        是否显示：<label><input type="radio" name="is_show" value="1" checked="checked" />是</label>
                                 <label><input type="radio" name="is_show" value="2" />否</label>
                    </div>
                    <div class="bbD">
                        排序：<input type="text" name="sort" class="input3" />
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" type="button" id="add" href="#">添加</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </form>
            </div>
		</div>
    </div>

<script>
    $(document).on('click','#add',function(){
        var data = $("#form").serialize()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.post(
            "{{url('catecont/story')}}",
            data,
            function(res){
                if(res.code==0){
                    var url = "{{url('catecont/index')}}"
                    location.href=url
                }
            }
        ),'json'
    })
</script>

@endsection