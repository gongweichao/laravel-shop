@extends('weixin.index')

@section('title',"商品分类")

@section('content')

<div class="l_left" id="con_left">
	<!--标题-->
	<ul class="job_sub" id="scroller1" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
		@foreach($category as $key=> $c)
		<li @if($key==0)class="off"@endif data-cataid="{{$c->id}}">
			<a href="javascript:void(0)">
				{{$c->name}}
			</a>
		</li>
		@endforeach
	</ul>
</div>
<div class="l_right" id="con_right">
	<div class="rightBox" id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
		<!-- 二级  -->
		@foreach($list as $l)
		<div class="fr_ite   fr_ite_{{$l->id}}" data-cataid="{{$l->id}}">
			@foreach($l->child as $child)
			<!-- 二级数据显示 -->
			<div class="sub_ites" style="text-align: center;">
				<span>{{$child->name}}</span>
			</div>
			<!-- 三级显示 -->
			
			<ul>
				@if(count($child->goods) == '0')
					<li style="margin: auto ">暂无产品</li>
				@endif
				
				@foreach($child->goods as $g)
				
			
				
				<li>
					<a href="/goods/{{$g->id}}">
						<img class="img_lazy" data-original="../goods_img/{{$g->preview}}" src="../goods/{{$g->preview}}" style="display: inline;">
						<br>
						<span>{{$g->name}}</span>	
					</a>
				</li>
				@endforeach
			</ul>
			@endforeach
	
			
		</div>
		@endforeach	
	<!--<a class="all_cata" href="http://www.mmb.cn/wap/touch/html/filter/id_78.htm">
				<span>浏览全部手机/配件商品</span>
			</a>-->
	</div>
</div>

@endsection

@section('myjs')
<script type="text/javascript">var myScroll, myScrollri;
var $ulLeft;
var cataId = 0;

function pullUpAction() {
	setTimeout(function() {
		myScrollri.refresh();
	}, 500);
}

function init_left_li() {
	var total_hei = $ulLeft.height(); //总高度
	var li_height = $ulLeft.find("li").height(); //单个li高度
	var li_num = $ulLeft.find("li").length; //个数
	console.log($ulLeft.find(".off").offset().top);
}
/**
 * 初始化iScroll控件
 */
function loaded() {
	$ulLeft = $("#con_left");
	myScroll = new IScroll("#con_left", {
		mouseWheel: true,
		click: true,
		preventDefault: false,
		preventDefaultException: {
			tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/
		}
	})
	myScrollri = new IScroll("#con_right", {
		mouseWheel: true,
		click: true
	})
	myScrollri.on("scrollStart", function() {
		pullUpAction();
	});
	myScrollri.on("scroll", function() {
		pullUpAction();
	});
	myScrollri.on("scrollEnd", function() {
		$('.fr_ite_' + cataId).find("img").lazyload({
			threshold: 200
		}).on('load', function() {
			pullUpAction();
		});
	});
	$('.job_sub li').eq(0).click();
}
//初始化绑定iScroll控件
document.addEventListener('touchmove', function(e) {
	e.preventDefault();
}, false);
document.addEventListener('DOMContentLoaded', loaded, false);

/* 切换内容*/
$(function() {
	$('.job_sub li').click(function() {
		$(this).addClass('off').siblings().removeClass('off');
		var str = "#con_left li:nth-child(" + ($(this).index() + 1) + ")";
		setTimeout(function() {
			myScroll.scrollToElement(document.querySelector(str));
		}, 300);
		cataId = $(this).attr("data-cataId");
		$('.fr_ite_' + $(this).attr("data-cataId")).removeClass('disp').siblings().addClass('disp');
		/* $('.fr_ite_'+$(this).attr("data-cataId")).find("img").lazyload({effect: "fadeIn"}); */
		pullUpAction();
		myScrollri.scrollTo(0, 0, 100, IScroll.utils.ease.elastic);
		/* myScrollri = new IScroll("#con_right",{
		mouseWheel: true, click: true
		}) */
	});
	$(".fr_ite ul").each(function() {
		if($(this).find("li").length == 1) {
			$(this).addClass("left_num1");
		} else if($(this).find("li").length == 2) {
			$(this).addClass("left_num2");
		}
	})
	$(".img_lazy").lazyload({
		effect: "fadeIn"
	});
});

/*隐藏浏览器的地址栏*/
window.onload = srcTop;

function srcTop() {
	setTimeout(function() {
		window.scrollTo(0, 1)
	}, 0);
	if(document.documentElement.scrollHeight <= document.documentElement.clientHeight) {
		bodyTag = document.getElementsByTagName('body')[0];
		bodyTag.style.height = document.documentElement.clientWidth / screen.width * screen.height + 'px';
	}
};
setInterval("myInterval()", 1000); //1000为1秒钟
function myInterval() {
	$("body").height($(window).height());
}</script>

@endsection
