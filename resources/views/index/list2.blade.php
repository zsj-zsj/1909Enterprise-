@extends('index.layout.public')

@section('title', '主页')
  
@section('content')

  
   <div class="page-right">
   	 <div class="pagelujing"><div class="name">仲裁员守则</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">仲裁员</a> > <a href="#">仲裁员守则</a></span></div>
     <div class="news-txt ny mg-t-b">
      <div class="news-con" id="aaa">
        <ul class="newslist ny" v-for="data in info">
          <li><a v-bind:href="url+[data['id']]"><{data['title_name']}></a><span><{data['time']}></span></li>
        </ul>
        <div class="tcdPageCode"></div>
      </div>
    </div>
   	 
   </div>
   <div class="clearfix"></div>

   <script>
      var a = new Vue({
        el : "#aaa",
        data : {
          info : null,
          url : "info?id="
        },
        delimiters:['<{','}>'],
        mounted(){
          var url = 'title'
            axios.post(url).then(function(res){
                a.info=res.data
            })
        }
      })
   </script>
@endsection
