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
		<link rel="stylesheet" type="text/css" href="../css/cart.css">
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body>
		<div class="new_wap_con">
			<div class="shop_header">
				<div class="shop_head_fl" style="margin-top: 10px;">
					<a href="javascript:history.back()" id="p_go">
						<img alt="" src="../img/hd_lt.png">
					</a>
				</div>
				<div class="shop_head_fm">
					<h1>购物车</h1>
				</div>
				<div class="shop_head_fr" id="shop_open_down" style="display: none;">

				</div>
			</div>
			<!-- 商品信息展示 -->
			<div class="new_acart_pro_lis">
					@if($cart_items == null)

					<div>
						<span id=""> 购物车空空如也 </span>
					</div>

					@else
					@foreach($cart_items as $key=> $cart_item)
					<div class="pros_posi" >

						<dl >
							<input type="checkbox"style="width: 20px;height: 20px;" class="ck" value="{{$cart_item->id}}" name="cart_item"/>
							<dt>
							<a href="/goods/{{$cart_item->goods['goods_id']}}">
								<img src="../goods_img/	{{ $cart_item->goods['img'] }}">
							</a>
							</dt>
							<input type="hidden"  class="sku" value="{{$cart_item->sku}}" />
							<dd class="">
								<a class="pri_new_title" href="/goods/{{$cart_item->goods['goods_id']}}">
									{{$cart_item->goods['name']}}
								</a>
								<span style="margin-top:30px;position: absolute;">{{$cart_item->attr}}</span>
								<div class="pri_new_price " style="margin-top: 50px;float: left;">
									<em class="price">￥{{ $cart_item->goods['price']}}</em>
								</div>
								<div class="pri_new_price " style="margin-top: 50px;float: right;">
									<em class= "all_price">￥{{$cart_item->num * $cart_item->goods['price']}}</em>
								</div>
								<div class="pro_edits">
									<span class="edits_add_reuse"> <span class="edits_reuse " >-</span>
									<input type="text" value="{{$cart_item->num}}" class="num" readonly="">
									<span  class="edits_add ">+</span> </span>
									<span class="delete_pros"> <!-- <i></i> --> <span class="rig" >
									<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/dels.png">
									<span>删除
									<br>
									商品</span>
								</div>
							</dd>
						</dl>
					</div>
					@endforeach
					<!-- 赠品 -->

					<div class="ac_new_tot_price" style="display: inline; position: fixed;width: 100%;bottom: 0px;height: 60px;z-index: 5;">

						<div class="up_tabs">
							<div id="detailDiscount">
								<span class="ta_bg_down"></span>
							</div>
						</div>
						<div class="tat" >
							<div style="float: left;width: 90px;height: 100%;margin-top: -10px;background:#E1E1E1 ;">
								<div style="margin-top: 15px;margin-left: 10px;">
									<input name="need_inv" type="checkbox" style="height:20px;width:20px;" id="all_ck">
									<span style="margin-left: 5px;">全选</span>
								</div>

							</div>

							<a  class="weui-btn weui-btn_mini weui-btn_warn" style="float:right;width: 80px;height: 40px;" onclick="to_order()">
								<span style="font-size: 16px;color: white;">结&nbsp算</span>
							</a>
							<span style="position:absolute;bottom: 15px;right: 100px;">合计：<span id="totalPrice"></span></span>

						</div>

					</div>
					
					
					@endif
		</div>	
		</div>			
	</body>
	<script type="text/javascript">
			var arr = [];
$(function() {

	$('.pros_posi').each(function() {
		var th = this;
		var nums = parseInt($(th).find('.num').val());
		var sku = $(th).find('.sku').val();
		$(th).find('.edits_reuse').click(function() {
			if(nums <= 1) {
				$(this).addClass('no_acti');
				return;
			} else {
				num = -1;
				$.ajax({
					type: "get",
					url: "/service/addcart",
					dataType: 'json',
					async: true,
					data: {
						sku_id: sku,
						num: num
					},
					success: function(res) {
						console.log(res.status);
						if(res.status == 0) {
							location.reload();
						}
					}
				});

			}
		});
		$(th).find('.edits_add').click(function() {

			num = 1;
			$.ajax({
				type: "get",
				url: "/service/addcart",
				dataType: 'json',
				async: true,
				data: {
					sku_id: sku,
					num: num
				},
				success: function(res) {
					console.log(res.status);
					
					if(res.status == 0) {
						location.reload();
					}
				}
			});

		})
		$(th).find('.delete_pros').click(function() {

			$.ajax({
				type: "get",
				url: "/service/cart_del",
				dataType: 'json',
				async: true,
				data: {
					sku: sku
				},
				success: function(res) {
					console.log(res.status);
					if(res.status == 0) {
						location.reload();
					}
				}
			});

		})
		$(th).find('.ck').change(function(){
			var strs = sku+":"+nums
			if($(this).prop('checked')==true){
				arr.push(strs);
			}
			if($(this).prop('checked')==false){
				$("#all_ck").prop("checked", false);
				arr.splice(jQuery.inArray(strs,arr),1);
			}
			get_allprice(arr)
		})
		

	})
	
	

})

function get_allprice(arrs){
		var arrs = arrs;
		//console.log(arrs);
		if(arr.length==0){
			$('#totalPrice').text('');
		}
		
		$.ajax({
				type: "get",
				url: "/service/get_allprice",
				dataType: 'json',
				async: true,
				data: {
					arrs:arrs 
				},
				success: function(res) {
					$('#totalPrice').text('￥'+res);
				}
		});
	}
	
$("#all_ck").click(function(){   
    if(this.checked){ 
    	
    	$('.pros_posi').each(function(){
    		var nums = parseInt($(this).find('.num').val());
			var sku = $(this).find('.sku').val();
			var strs = sku+':'+nums;
			arr.push(strs);
    	})
    	  
        $(".pros_posi :checkbox").prop("checked", true);  
    }else{   
    	arr = [];
		$(".pros_posi :checkbox").prop("checked", false);
    } 
    
    get_allprice(arr);  
});

function to_order(){
	var cart_arr = [];
	$('input:checkbox[name=cart_item]').each(function(i,e){
		if($(this).prop('checked')==true){
			cart_arr.push($(this).val());
		}
	})
	if(cart_arr.length==0){
		alert('请选择结算的商品');
	}
	location.href= '/order_commit/'+cart_arr;
	
}

</script>
</html>