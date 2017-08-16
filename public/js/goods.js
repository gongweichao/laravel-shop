$(function(){
	var attr = Array();
	if($(".sys_item_specpara").length==0){
		get_price('');
	}
	$(".sys_item_specpara").each(function(i){
		var th = $(this);
		th.attr('data-sid',i);
		var sid = th.data('sid');
		var keys = th.data('type');
		th.find('ul>li').click(function(){	
			var id = $(this).data('id');
			attr[keys] = '|'+id+'|';
			if($(this).hasClass('error')){
				return;
			}
			if($(this).hasClass("selected")){
				$(this).removeClass("selected");
				delete attr[keys] ;
				r(sid);
			}else{
				$(this).addClass("selected").siblings("li").removeClass("selected");
				var img = $(this).data('img');
				if(img !='../goods_img/'){
					$("#imgs").attr("src",img);
				}
				
				check(id,sid);	
			}
			get_price(attr);
		})
		
	})
	
	
	

$('.add').click(function(){
	var num = parseInt($('.num').val());

	$('.num').val(num+1);
})	
$('.reduce').click(function(){
	var num = parseInt($('.num').val());
	if(num>1){
		$('.num').val(num-1);
	}else if(num<=1){
		$('.num').val(1);
	}
	
})

})
function check(id,sid){
	
	$.ajax({		
		type:"GET",
		url:'/service/goods/check',
		
		data:{attr_id:id},
		dataType: 'json',
		success:function(res){

			if(res.length==0){
					r(sid);
			}
			for(i=0;i<res.length;i++){
				var a = res[i].replace(/\|/g,'');
				$("li[data-id='"+a+"']").addClass('error');
			}
		}
	})	
}

function r(sid){
	$('.sys_item_specpara').each(function(i){
		if(i!=sid){
			$(this).find('li').removeClass("error");
		}
	})
}
function get_price(arr){
	
	var str = '';
	var count =0; 
	var goods_id = $('#goods_id').val();
	
	if(arr){
		
		for (var val in arr) {
			str = str+arr[val]+',';
			count++;
		}
		str=str.substring(0,str.length-1);
	}
	
	if(count==$('.sys_item_specpara').length){
		
		$.ajax({
			type:"get",
			url:"/service/goods/get_price",
			async:true,
				dataType: 'json',
			data:{goods_attr:str,goods_id:goods_id},
			success:function(res){
				
				$('#sku').val(res.id);
				$('.price').text('￥'+res.price);
			}
		});
	}else{
		$('#sku').val('');
		$('.price').text('请选择具体商品属性');
	}
}

function _addcart(){
	var sku_id =  $('#sku').val();
	var num  = parseInt($('.num').val());
	if(sku_id==''){
		alert('请选择商品属性');
	}
	$.ajax({
		type:"get",
		url:"/service/addcart",
		dataType: 'json',
		async:true,
		data:{sku_id:sku_id,num:num},
		success:function(res){
			
			if(res.status==0){
				alert(res.msg);
			}
		}
	});
	
	
}






