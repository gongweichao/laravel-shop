<?php

namespace App\Http\Controllers\Service;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Model\Cart;
use DB;

class CartController extends Controller
{
	public function addcart(Request $request){
		
		$msg = [];
		
		$sku_id  = $request->Input('sku_id');
		$num  = $request->Input('num');
		$member = $request->session()->get('member');
		$cart = $request->cookie('cart');
		$cart_arr = $cart!=null?explode(',', $cart):array();
		$nums=0;
		//如果用户登陆则直接入库
		if($member){
			$check = Cart::where('sku',$sku_id)->where('member_id',$member->id)->first();
				if($check != null){
					$check->num = $check->num +$num;
					$check->save();
				}
				if($check ==null){
					$cart = new Cart;
					$cart->sku = $sku_id;
					$cart->num = $num;
					$cart->member_id = $member->id;
					$cart->save();
				}
			$msg['status'] = '0';
			$msg['msg'] = '添加成功';
			return response($msg);	
			
		}
		
		
		//未登陆
		
		foreach ($cart_arr as $key => &$value) {
				$i = strpos($value,':');
				//购物车中已存在
				if($sku_id == substr($value, 0,$i)){
					$nums = substr($value, $i+1)+$num;
					$value = $sku_id.":".$nums;
					break;
				}	
			}
	
		if($nums=='0'){	
			array_push($cart_arr,$sku_id.':'.$num);
		}	
		$msg['status'] = '0';
		$msg['msg'] = '添加成功';
		return response($msg)->withCookie('cart',implode(',', $cart_arr));	
		
	}
	public function cart_del(Request $request){
		
		$sku = $request->Input('sku');
		$cart =  $request->cookie('cart');
		$cart_arr = explode(',', $cart);
			$member = $request->session()->get('member');
			
		if($member){
			
			Cart::where('sku',$sku)->where('member_id',$member->id)
->delete();			
			
		}	
		
		foreach ($cart_arr as $key => $value) {
			
			$i = strpos($value,':');
			
			if(substr($value,0, $i)==$sku){
				array_splice($cart_arr,$key,1);
				break;
			}
	
		}
		
		$msg['status'] = '0';
		$msg['msg'] = '删除成功';
		return response($msg)->withCookie('cart',implode(',', $cart_arr));
		
	}
	
	public function get_allprice(Request $request){
		$price = 0;
		$sku_arr = $request->input('arrs');
		if(empty($sku_arr )){
			return ;
		}
		foreach ($sku_arr as $key => $value) {
			$i = strpos($value,':');
			$sku_id = substr($value,0, $i);
			$p = DB::table('goods_stock')->where('id',$sku_id)->value('price');
		
			$price = $price + ($p*substr($value, $i+1));
		}
		return $price;
	}

}
