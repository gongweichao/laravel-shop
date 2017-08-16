<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use DB;

class GoodsController extends Controller
{
	public function show($id){
		
		// 商品信号
		$info  = DB::table('goods_attr')->select('goods_attr.*','attr.attr_name')->join('attr','goods_attr.attr_id','=','attr.id')->where('goods_id',$id)->get();
		$attr = [];
		foreach ($info as $key => $value) {
			$value->img = '../goods_img/'.$value->img;
			$attr[$value->attr_name][] = $value	;
				
		}	
		$goods = Product::where('id',$id)->first();
		//dd($info);
		return view('weixin.goods',compact('attr','goods'));
	}
}
