@extends('weixin.index')

@section('title','个人中心')

@section('content')
<div class="user_center_body">
				<div class="user_center_left" style="height: 100px;text-align: center;">
					@if($member)
						<table width="100%" >
							<tbody><tr>
								<td>
									用户名：<span>{{$member->phone}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td align="right">
									</td>
							</tr>
						</tbody></table>
					@else	
						<div>
							<span>您还没有登陆</span>
							<br />
							<a  href="/login" class="weui-btn weui-btn_mini weui-btn_primary" />立刻登陆</a>
						</div>
					@endif
				</div>
					
				<!--<ul class="list-tab">
					<li>
						<a href="/wap/shop/orders.do?status=1&amp;buymode=1&amp;uuniq=1500967338713010">
							<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/user_money.png"><br>
							待付款
						</a>
					</li>
					<li>
						<a href="/wap/shop/orders.do?status=6&amp;uuniq=1500967338713679">
							<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/user_deliver.png"><br>
							已发货
						</a>
					</li>
					<li>
						<a href="/wap/shop/orders.do?status=3&amp;uuniq=1500967338713070">
							<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/user_cancel.png"><br>
							已取消
						</a>
					</li>
					<li>
						<a href="/wap/shop/orders.do">
							<img src="http://rep3.mmb.cn/wap/upload/touch/newWap/icon/user_search.png"><br>
							查单
						</a>
					</li>
				</ul>-->
				<div class="user_fenge"></div>
				<div class="user_fenge"></div>
				@if($member)
				<div class="main_content_last">
					<a href="/wap/shop/orders.do?uuniq=1500967338713220">
						<img src="../img/all_order.png">&nbsp;全部订单
					</a>
				</div>
				<div class="user_fenge"></div>
				<div class="main_content_last">
					<a href="/wap/userMember.do?method=openUserAddrPage&amp;uuniq=1500967338713355">
							<img src="../img/user_address.png">&nbsp;收货地址管理
						</a>
				</div>
				<div class="user_fenge"></div>
				@endif
				<div class="main_content">
					<a href="/cart">			
						<img src="../img/cart.png">&nbsp;购物车
					</a>
				</div>
				<div class="user_fenge"></div>
			
				
				<!--<div class="user_fenge"></div>
			<a id="btn_line" href="/wap/logout.do?uuniq=1500967338715378">退出登录</a>
			</div>-->

@endsection

@section('myjs')
@endsection
