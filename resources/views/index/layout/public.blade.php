<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link href="/style/css/base.css" rel="stylesheet" type="text/css" />
<link href="/style/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/style/js/jquery-1.8.3.min.js"></script>
<link href="/style/css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="/style/js/jquery.slideBox.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="/style/js/nav.js"></script>
<script src="/style/js/vue.min.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
jQuery(function($){
	$('#newspic').slideBox({
		duration : 0.3,//滚动持续时间，单位：秒
		easing : 'linear',//swing,linear//滚动特效
		delay : 5,//滚动延迟时间，单位：秒
		hideClickBar : false,//不自动隐藏点选按键
		clickBarRadius : 10
	});
});
</script>
</head>
<body>
<div class="header">
  <div class="container">
    <div id="weather"></div>
    <div class="toptxt"><a href="#">登陆</a>|<a href="#">注册</a><a href="#">加入收藏</a><a href="#">设为首页</a></div>
    <div class="logo"><a href="#"><img src="/style/images/logo.png" /></a></div>
    <div class="search">
      <input type="text" class="ipt-sea" placeholder="请输入搜索关键词" />
      <a href="javascript:;">搜索</a> </div>
  </div>
</div>
<div class="nav" id="vue">
    <ul class="" id="navul"  v-for="info in data">
        <li class=""><a v-bind:href="[info['url']]"><{info['name']}></a></li>
    </ul>
</div>
<div class="container mg-t-b container_col">
  <div class="page-left" id="vue2">
			<div class="pagelist" >
				<h1 ></h1>
				<ul class="listbox" v-for="info in data">
					<li><a :href="[info['url']]"><{info['name']}></a></li>
				</ul>
			</div>
			<div class="news-txt hotarticl">
				<div class="hottit"><span>热文推荐</span></div>
				<div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
			</div>
   </div>

        @yield('content')

</tbody></table>
    </div>
   	 
   </div>
   <div class="clearfix"></div>
</div>
<div class="foot">
  <div class="ft-menu">
    <div class="container">
    	<div class="menu">
        	<dl>
            	<dt>首页</dt>
                <dd>
                	<a href="#"></a>
                </dd>
            </dl>
            <dl>
            	<dt>关于我们</dt>
                <dd>
                	<a href="#">关于中仲</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁动态</dt>
                <dd>
                	<a href="#">仲裁动态</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁员</dt>
                <dd>
                	<a href="#">仲裁员名册</a>
                    <a href="#">仲裁员守则</a>
                </dd>
            </dl>
            <dl>
            	<dt>法律制度</dt>
                <dd>
                	<a href="#">仲裁规则</a>
                    <a href="#">法律法规</a>
                    <a href="#">统计数据</a>
                </dd>
            </dl>
            <dl>
            	<dt>在线服务</dt>
                <dd>
                	<a href="#">在线咨询</a>
                    <a href="#">立案申请</a>
                </dd>
            </dl>
            <dl class="last">
            	<dt>中卫仲裁委员会</dt>
                <dd>
                	<p>联系地址：中卫市沙坡头区清风路55号（市财政局后楼四楼）</p>
                    <p>邮政编码：755000</p>
                    <p>咨询电话：0955-7674885</p>
                    <p>电子邮件：baidu@163.com</p>
                    <p>网　　址：www.baidu.com</p>
                </dd>
            </dl>
            <div class="clearfix"></div>
        </div>
        <div class="ewm">
        	<img src="/style/images/ewm.png" />
            <p>扫码关注公众号</p>
        </div>
        <div class="clearfix"></div>
    </div>
  </div>
  <div class="cop">
    <div class="container">&copy; 2018 XX公司&nbsp;&nbsp;ICP备XXXXXXXX号&nbsp;&nbsp;技术支持：<a style="color:#b7c1c6;" href="http://www.jsdaima.com/" title="js代码" target="_blank">js代码</a></div>
  </div>
</div>

</body>
</html>

<script>
    var vue = new Vue({
        el : "#vue",
        data : {
            data : null,
        },
        delimiters:['<{','}>'],
        mounted(){
            var url = 'navigation'
            axios.post(url).then(function(res){
                vue.data=res.data
            })
        },
    })

    var vue2 = new Vue({
        el : "#vue2",
        data : {
            data : null,
        },
        delimiters:['<{','}>'],
        mounted(){
            var url = 'navigation'
            axios.post(url).then(function(res){
                vue2.data=res.data
            })
        },
    })
</script>
