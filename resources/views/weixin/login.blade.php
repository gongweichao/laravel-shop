@extends('weixin.index')

@section('title','用户登录')



@section('content')
<br />
<form action="">
<div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" id="phone" placeholder="请输入手机号码">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">密码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" id="password" placeholder="请输入密码
                    	">
                </div>
            
            </div>          
            <div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="code" placeholder="请输入验证码">
                </div>
                <div class="weui-cell__ft">
                    <img class="weui-vcode-img" id="yzm"  src="">
                </div>
            </div>
            <br />
            <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
            <a href="javascript:;" class="weui-btn weui-btn_primary" id="login">登&nbsp;陆</a>
            
            
            <a href="/regist" style="margin-top: 30px;margin-left: 40%;">立即注册</a>
        </div>	

	
</form>

@endsection


@section('myjs')
<script type="text/javascript">
	
	$(function(){
		yam();
	})
	function yam(){
		$.ajax({
			type:"get",
			url:"/test",

			data:{_token:$('#token').val()},
			success: function(data){
				$('#yzm').attr('src',data);
			}
		});
	}
	$('#yzm').click(function(){
		
		yam();
	})
	
	$('#login').click(function(){
		var phone = $('#phone').val();
		var password = $('#password').val();
		var code = $('#code').val();
		if(phone==''){
			alert('请输入手机号');
		}else if(password==''){
			alert('请输入密码');
		}else if(code == ''){
			alert('请输入验证码');
		}else{
			$.ajax({
				type:"post",
				url:"/service/login",
				data:{
					phone:phone,
					password:password,
					code :code,
					_token:"{{ csrf_token() }}",
				},
				dataType:"json",
				async:true,
				success:function(res){
					//console.log(res);
					if(res.status !=0){
						alert(res.msg);
					}else{
						alert(res.msg);
						window.location.href = '/user';
					}
				}
			});
		}
		
		
	})
	
</script>

@endsection
