<html>
	<head>
		<meta charset="utf-8" http-equiv="Content-Type">
		<title>荣耀 畅玩6X 4GB+32GB 全网通4G手机 高配版 铂光金 - 买卖宝网上商城mmb.cn</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" type="text/css" href="../css/proList.css">
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	    <script type="text/javascript" src="../js/goods.js"></script>
		<div class="shop_header">
			<div class="shop_head_fl" style="margin-top: 10px;">
				<a href="javascript:history.back()" id="p_go">
					<img alt="" src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/hd_lt.png">
				</a>
			</div>
			<div class="shop_head_fm">
				<h1>商品详情</h1>
			</div>
		</div>
		<div class="shop_down_bg" onclick="hiddenDiv()" style="display: none;"></div>

		<div class="jdDetails">
			<div class="jdGoods" style="position:relative;">
				<!-- 轮播  -->
				<div class="home_swipes jd_oth_imgs">
					<div class="slide home_slide" id="slide428009_2">
						<ul>
							<li>
								<img id="imgs" src="../goods_img/pms_1488358225.13157868!560x560.jpg">
							</li>
						</ul>
						<div class="dot">
							<span class="cur"></span><span class=""></span><span class=""></span><span class=""></span><span class=""></span><span class=""></span>
						</div>
					</div>
				</div>
				<p id="js_title">
					{{$goods->name}}
				</p>
				<h1><em id="product_price"><span class="price">请选择具体商品属性
				</span></em><span class="new_sp">人气 5505   |   销量  1198</span></h1>
				<div id="promotion_msg" class="clear">
					<h2></h2>
				</div>
				<input type="hidden" value="{{$goods->id}}" id="goods_id">
				<input type="hidden" value="" id="sku">
					
			</div>

			<div class="jdGoods2">
				<!-- 商品属性列表  -->
				<div class="iteminfo_buying">
					<!--规格属性-->
					<div class="sys_item_spec">
						<!-- 一级属性 -->
						@foreach($attr as $key=> $a)
						<dl class="clearfix iteminfo_parameter sys_item_specpara" data-type = "{{$key}}"  >
							<dt>
							{{$key}}
							</dt>
							<dd>
								<ul class="sys_spec_text">
									@foreach($a as $k=> $s)
									<li  data-id="{{$s->id}}" data-img="{{$s->img}}" >
										<a>
											{{$s->attr_val}}
										</a><i></i>
										
									</li>
									@endforeach
								</ul>
								
							</dd>
						</dl>
						<!-- 二级属性  -->
						@endforeach
						<!-- 三级属性 -->
						<!-- 四级属性 -->
					</div>
					<!--规格属性-->
				</div>
				<div class="order_line"></div>
				<p class="pro_nums">
					购买数量
					<span class="shopNum">
					<input type="button" class="reduce" value="-">
					<input type="text" class="num" readonly="readonly" value="1">
					<input type="button" class="add" value="+">
					</span>
				</p>
				<p class="addbuys">
					<span class="span2" id="buy">立即购买</span>
					<span class="span1" id="add_acart_buy" onclick="_addcart()">加入购物车</span>
				</p>
				<div style="background-color:#eee;height:15px;border-bottom:1px solid #dbdbdb;border-top:1px solid #dbdbdb;"></div>
			</div>

			<!-- 商品信息 -->
			<div class="jdGoods3">
				<div class="l_left">
					<!--标题-->
					<ul class="job_sub">
						<li >
							<a href="javascript:void(0)">
								商品信息
							</a>
						</li>
						<li >
							<a href="javascript:void(0)">
								参数详情
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								评论晒单
							</a>
						</li>
					</ul>
				</div>
				<div class="l_right" style="min-height:200px">
					<!--商品详情-->
					<div class="rightBox fr_ul_li01 disp">
						qqqqqqqqqqqqqqqq
					</div>

					<!--商品参数-->
					<div class="rightBox fr_ul_li ">
						<div class="fr_ite">
							wwwwwwwwwwwwwwwwwwwww
						</div>
					</div>

					<!--买家评论-->
					<div class="rightBox fr_ul_li ">
						<div class="fr_ite">

						</div>
					</div>
				</div>
			</div>

			</body>
</html>