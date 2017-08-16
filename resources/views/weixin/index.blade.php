<!DOCTYPE HTML>
<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="../css/weui.css"/>
		 <link rel="stylesheet" type="text/css" href="../css/common.css">
    	<link rel="stylesheet" type="text/css" href="../css/catalog.css">
    	<link rel="stylesheet" type="text/css" href="../css/seacher.css">
    	<link rel="stylesheet" type="text/css" href="../css/user.css">
    		
    		
	</head>
	<body>
		<div class="page"  >
			<div class="shop_header" @if($act == 'home') style="display: none;"@endif >
		        <div class="shop_head_fl">
		            <a href="javascript:history.back()" id="p_go"><img alt="" src="../img/hd_lt.png"></a>
		        </div>
		        <div class="shop_head_fm">
		            <h1>@yield('title')</h1>
		        </div>
		        <div class="shop_head_fr" id="shop_open_down">
		            <a href="/"><img alt="" src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/n_home.png"></a>
		        </div>
		    </div>
			
				
			@yield('content')
			
			
			<div class="weui-tabbar">
				<input type="hidden" name="act" id="act" value="{{$act}}" />
                <a href="/"  id="home" class="weui-tabbar__item">
                    <span style="display: inline-block;position: relative;">
                        <img src="./img/home.png" alt="" class="weui-tabbar__icon">
                    </span>
                    <p class="weui-tabbar__label">首页</p>
                </a>
                <a  href="/category" id="category"  class="weui-tabbar__item">
                    <img src="./img/category.png" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">分类</p>
                </a>
                <a  href="/seach"  id="seach" class="weui-tabbar__item">
                    <span style="display: inline-block;position: relative;">
                        <img src="./img/seach.png" alt="" class="weui-tabbar__icon">
                    </span>
                    <p class="weui-tabbar__label">搜索</p>
                </a>
                <a  href="/user"  id="user"   class="weui-tabbar__item">
                    <img src="./img/user.png" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">我</p>
                </a>
            </div>
		</div>
	</body>

	  <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	    <script type="text/javascript" src="../js/iscroll.js"></script>
    <script type="text/javascript" src="../js/jquery.lazyload.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var act = $('#act').val();
				$("#"+act).addClass('weui-bar__item_on');
				var src = './img/'+act+'_active.png';
				$("#"+act).find('img').attr('src',src);
				
			})

		</script>
	  
	  @yield('myjs')
</html>
