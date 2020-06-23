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
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <div class="bbD">
                        所属分类：
                        <select class="input3" name="cate_id">
                            @foreach ($catename as $v)
                            <option value="{{$v->cate_id}}" {{$v->cate_id==$data->cate_id ? 'selected' : ''}}>{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="bbD">
                        新闻标题：<input type="text" value="{{$data->title_name}}" name="title_name" class="input3" />
                    </div>
                    <div class="bbD">
                        新闻来源：<input type="text" value="{{$data->from}}" name="from" class="input3" />
                    </div>
                    <div class="bbD">
                        新闻内容：
                        <div class="btext2">
                            <textarea class="text2" name="text">{{$data->text}}</textarea>
                        </div>
                    </div>
                    <div class="bbD">
                        是否显示：<label><input type="radio" name="is_show" value="1" {{$data->is_show==1 ? 'checked' : ''}} />是</label>
                                 <label><input type="radio" name="is_show" value="2" {{$data->is_show==2 ? 'checked' : ''}} />否</label>
                    </div>
                    <div class="bbD">
                        排序：<input type="text" value="{{$data->sort}}" name="sort" class="input3" />
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" type="button" id="add" href="#">修改</button>
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
            "{{url('catecont/upd')}}",
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