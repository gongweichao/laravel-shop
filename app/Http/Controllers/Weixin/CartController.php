<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Model\Cart;
use App\Model\Goods_stock;
use DB;

class CartController extends Controller
{
	public function show(Request $request){
		$cart_items = array();
		$cart = $request->cookie('cart');
		$cart_arr = $cart!=null?explode(',', $cart):array();
		$member = $request->session()->get('member');
		//判断是否登陆i，登陆则同步购物车
		if($member){
			
			$arr = [];
			foreach ($cart_arr as $key => $value) {
				$i = strpos($value,':');
				$sku = substr($value, 0,$i);
				
				$check = Cart::where('sku',$sku)->where('member_id',$member->id)->first();
				if($check != null){
					$check->num = $check->num +substr($value,$i+1);
					$check->save();
				}
				if($check ==null){
					$cart = new Cart;
					$cart->sku = substr($value, 0,$i);
					$cart->num = substr($value,$i+1);
					$cart->member_id = $member->id;
					$cart->save();
				}
			}
			$cart_arrs = Cart::where('member_id',$member->id)->get();
			foreach ($cart_arrs as $value) {
				
				$value->goods = Goods_stock::select('goods_stock.*','product.name','product.summary')->join('product','product.id','=','goods_stock.goods_id')->where('goods_stock.id',$value->sku)->first(); 
				$value->attr = $this->get_attr_name($value->goods['goods_attr']);
				array_push($arr,$value);
			}
			//dd($arr);
			return response()->view('weixin.cart',['cart_items'=>$arr])->withCookie('cart',null);
			
		}
	
		
		foreach ($cart_arr as $key => $value) {
			$i = strpos($value,':');
			$cart_item = new Cart;
			$cart_item->id = $key;
			$cart_item->sku = substr($value, 0,$i);
			$cart_item->num = substr($value,$i+1);
			$cart_item->goods = Goods_stock::select('goods_stock.*','product.name','product.summary')->join('product','product.id','=','goods_stock.goods_id')->where('goods_stock.id',$cart_item->sku)->first(); 
			$cart_item->attr = $this->get_attr_name($cart_item->goods['goods_attr']);
			
			array_push($cart_items,$cart_item);
		}	
		//dd($cart_items);
		return view('weixin.cart')->with('cart_items',$cart_items);
	}
	
	//h获取属性名称
	
	public function get_attr_name($arr){
		$attr = str_replace('|', '',$arr);
		$attr_arr = explode(',', $attr);
		$name = array();
		foreach ($attr_arr as  $value) {
			$c = DB::table('goods_attr')->where('id',$value)->value('attr_val');
			//print_r($c);	
			array_push($name,$c);
		}
		
		return implode('+', $name);
	}	
	

}

