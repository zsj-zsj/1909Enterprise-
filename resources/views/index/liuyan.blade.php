@extends('index.layout.public')

@section('title', '留言')

@section('content')


   <div class="page-right">
   	 <div class="pagelujing"><div class="name">在线留言</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">在线服务</a> > <a href="#">在线留言</a></span></div>
     <div class="news-txt ny mg-t-b">
       <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="liuyantab">
  <form action="" method="post" name="new" id="form"></form><tbody><tr>
    @csrf
    <td width="569" height="38" align="center" bgcolor="#F4F4F4" class="kkkk1">
      <a name="1" id="1"></a>
      
      <input type="radio" value="face2.gif" name="face" checked="checked">
      <img border="0" src="/style/images/face2.gif">
	    <input type="radio" value="face1.gif" name="face">
      <img border="0" src="/style/images/face1.gif">
      <input type="radio" value="face3.gif" name="face">
      <img border="0" src="/style/images/face3.gif">
      <input type="radio" value="face4.gif" name="face">
      <img border="0" src="/style/images/face4.gif">
      <input type="radio" value="face5.gif" name="face">
      <img border="0" src="/style/images/face5.gif">
      <input type="radio" value="face6.gif" name="face">
      <img border="0" src="/style/images/face6.gif">
      <input type="radio" value="face7.gif" name="face">
      <img border="0" src="/style/images/face7.gif">
      <input type="radio" value="face8.gif" name="face">
      <img border="0" src="/style/images/face8.gif">
      <input type="radio" value="face9.gif" name="face">
      <img border="0" src="/style/images/face9.gif">
      <input type="radio" value="face10.gif" name="face">
    <img border="0" src="/style/images/face10.gif"> </td>
  </tr>
  <tr>
    <td height="66" class="kkkk2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="11%" height="34" align="center">姓　名：</td>
          <td colspan="2">
		        <input name="name" type="text" class="input1" size="52" maxlength="20" style="width:95%; border:#999999 dashed 1px; color:#666666; padding:5px; outline:none;" onfocus="this.select()" onblur="if (this.value =='') this.value='请输入您的姓名，不填写为匿名发表'" onclick="if (this.value=='请输入您的姓名，不填写为匿名发表') this.value=''" value="请输入您的姓名，不填写为匿名发表">
		      </td>
      </tr>
      <tr>
        <td align="center">留　言：</td>
        <td colspan="2"><textarea name="text" id="text" cols="50" rows="7" style="width:95%; border:#999999 dashed 1px; color: #5C5C5C; line-height:20px; padding:5px; outline:none;"></textarea></td>
      </tr>
      <tr>
        <td height="27" align="center">验证码：</td>
        <td width="14%"><input name="code" type="text" class="ipt1" id="sn" size="10" style=" border:#999999 dashed 1px;"></td>
        <td width="75%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <img src="{{captcha_src('default')}}"  style="cursor: pointer" onclick="this.src='{{captcha_src('default')}}'+Math.random()">
          <tbody><tr>
            <td width="12%"></td>
          </tr>
        </tbody></table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><span class="font8">
          <div align="center" style="margin:20px 0;">
          {{-- <input type="hidden" name="action_e" value="Add_New"> --}}
          <input type="button" type="button" id="but" name="Submit2" value="发表留言"></div></span></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
    </div>
   	 
   </div>
   <div class="clearfix"></div>
</div>

<script>
  $(document).on('click','#but',function(){
    var face = $("input[name='face']:checked").val()
    var name = $("input[name='name']").val()
    var text = $("#text").val()
    var code = $("input[name='code']").val()
    var data = {
      face:face,name:name,text:text,code:code
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var url = '/domessage'
    $.ajax({
      type : "post",
      data: data,
      url : url,
      dataType : "json",
      success: function(res){
        if(res.yes==0){
          alert(res.msg)
          location.href='/message'
        }else{
          alert(res.msg)
        }
      }
    })
  })
</script>


@endsection