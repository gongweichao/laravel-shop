@extends('weixin.index')

@section('title','用户注册')



@section('content')
<br />
<form action="">
<div class="weui-cells weui-cells_radio">
            <!--<label class="weui-cell weui-check__label" for="x11">
                <div class="weui-cell__bd">
                    <p>手机注册</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" name="radio1" id="x11">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class="weui-cell weui-check__label" for="x12">

                <div class="weui-cell__bd">
                    <p>邮箱注册</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" name="radio1" class="weui-check" id="x12" checked="checked">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>-->
          
        </div>
<div class="weui-cells weui-cells_form">
            <!--<div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">昵称</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" class="name" placeholder="请输入昵称">
                </div>
            </div>-->
            <div class="weui-cell ">
                <div class="weui-cell__hd">
                    <label class="weui-label">手机号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" id="phone"  placeholder="请输入手机号">
                </div>
                <!--<div class="weui-cell__bd">
                    <input class="weui-input" type="tel" placeholder="请输入手机号">
                </div>
                <div class="weui-cell__ft" width="30%">
                    <button class="weui-vcode-btn">获取验证码</button>
                </div>-->
            </div>
           
            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="" class="weui-label">密码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" id="password1" value="" placeholder="请输入密码">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="" class="weui-label">确认密码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" id="password2" value="" placeholder="请确认密码">
                </div>
            </div>
          
        </div><br />
		<a href="javascript:;" class="weui-btn weui-btn_primary" id="regist">注&nbsp;册</a>
	
</form>

@endsection


@section('myjs')

<script type="text/javascript">
	$('#regist').click(function(){
		
		var phone =$('#phone').val();
		var password1 = $('#password1').val();
		var password2 = $('#password2').val();
		
		if(phone==''){
			alert("请输入手机号");
		}else if (password1 ==''){
			alert("请输入密码");
		}else if (password2==''){
			alert("请确认密码");
		}else if(password1 != password2){
			alert("两次密码不一致");
		}else{
			
			$.ajax({
				type:"post",
				url:"/service/regist",
				data:{
					phone:phone,
					password1:password1,
					_token:"{{ csrf_token() }}",
				},
				dataType:"json",
				async:true,
				success:function(res){
					if(res.status !=0){
						alert(res.msg);
					}else{
						alert(res.msg);
						window.location.href = '/login';
					}
				}
			});
			
		}

	})
</script>

@endsection
