@extends('index.layout.public')

@section('title', '主页')
  
@section('content')

  
   <div class="page-right">
      <div class="pagelujing"><div class="name">仲裁员守则</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">仲裁员</a> > <a href="#">仲裁员守则</a></span></div>

     <div class="biaoti">{{$data->cate_name}}</div>
				<div class="sshuomign"><span>来源：{{$data->from}}</span>|<span>发布时间：{{date('Y-m-d H:i:s',$data->time)}}</span></div>
				<div class="article_txt">{{$data->text}}</div>
   </div>
   <div class="clearfix"></div>
</div>

@endsection