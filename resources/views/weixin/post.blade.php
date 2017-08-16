<html>
	<head>
		<meta charset="utf-8" http-equiv="Content-Type">
		<title>买卖宝商城</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		 <link rel="stylesheet" type="text/css" href="../css/common.css">
		 	<link rel="stylesheet" type="text/css" href="../css/weui.css"/>
		<link rel="stylesheet" type="text/css" href="http://rep3.mmb.cn/wap/upload/touch/newWap/css/newshopcart.css">
		

	</head>
	<body>
		<div class="new_wap_con">
			<div class="shop_header">
				<div class="shop_head_fl">
					<a href="http://www.mmb.cn/wap/touch/html/product/id_428009.htm" id="p_go">
						<img alt="" src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/hd_lt.png">
					</a>
				</div>
				<div class="shop_head_fm">
					<h1>购物车</h1>
				</div>
				<div class="shop_head_fr" id="shop_open_down" style="display: none;">

				</div>
			</div>

			<form action="/wap/shop/aorderNew.do" method="post" id="orderForm" name="orderForm">

				<!-- 商品信息展示 -->
				<div class="new_acart_pro_lis">
				{{$cart_items[0]->goods[0]->img}}
					@foreach($cart_items as $cart_item)
					<div class="pros_posi">					
<input type="checkbox" class="weui-check" name="checkbox1" id="s11" checked="checked">
						<dl>
							
							<dt>
							<a href="/wap/touch/html/product/id_428009.htm">
								<img src="../goods_img/	{{ $cart_item->goods->id }}">
							</a>
							</dt>
							<dd class="">
								<a class="pri_new_title" href="/wap/touch/html/product/id_428009.htm">
									荣耀 畅玩6X 4GB 32GB 全网通4G手机 高配版 玫瑰金
								</a>
								<div class="pri_new_price">
									<em>￥{{$cart_item->num}}</em>
								</div>
								<div class="pro_edits">
									<span class="edits_add_reuse"> <span  class="edits_reuse no_acti">-</span>
									<input type="text" value="{{$cart_item->num}}" readonly="">
									<span  class="edits_add ">+</span> </span>
									<span class="delete_pros"> <!-- <i></i> --> <span class="rig" onclick="modifyProduct(428009,0,2,0)">
									<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/dels.png">
									<span>删除
									<br>
									商品</span> </span> </span>
								</div>
							</dd>
						</dl>
					</div>
					@endforeach
				<!-- 赠品 -->

				<div class="bg_lines"></div>
				<div class="ac_new_tot_price">

					<div class="up_tabs">
						<div id="detailDiscount">
							<span class="ta_bg_down"></span>
						</div>
					</div>
					<p class="tat">
						合计：<span id="totalPrice">￥1399</span>
					</p>
				</div>

	</body>
</html>