@extends('weixin.index')



@section('content')

<div id="ser_page" style="display: block;">
	<div class="page_cons">
		<form method="post" id="formInput2" action="/wap/shop/searchproduct.do">
			<div class="cons_ser">
				<input type="text" name="keyword" id="mou_input2" placeholder="请输入商品名称" value="" autocomplete="off">
				<span id="clear_val" class="clear_in_val2"></span>
			</div>
			<a href="javascript:history.back()" id="p_go"><span id="close_serc"> </span>        </a>
			<input type="button" id="sum_page" class="sum_page_form2" value="">
		</form>
	</div>
	<div class="page_conts">
		<div class="ui-search-filter-cont lxc_section">
			<ul class="ui-search-filter-opts_2" id="lxc_ul"></ul>
		</div>
		<div class="ui-search-filter-cont lxc_sec">
			<h1>热门搜索</h1>
			<ul class="ui-search-filter-opts_1">
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=婴幼奶粉6折">
						婴幼奶粉6折
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=纸尿裤">
						纸尿裤
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=家用家电大放价">
						家用家电大放价
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=男装低至9元">
						男装低至9元
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=零食馋嘴屋">
						零食馋嘴屋
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=机械表">
						机械表
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=华为爆款直降">
						华为爆款直降
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=女裙低至9元">
						女裙低至9元
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=抢小米新机">
						抢小米新机
					</a>
				</li>
				<li>
					<a href="/wap/shop/searchproduct.do?keyword=美白补水大放价">
						美白补水大放价
					</a>
				</li>
			</ul>
		</div>
		<div class="ui-search-filter-cont lxc_sec">
			<h1>历史记录</h1>
			<div class="page_content">
				<div class="no_search">
					<span>没有历史搜索记录</span>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection

@section('myjs')
@endsection
