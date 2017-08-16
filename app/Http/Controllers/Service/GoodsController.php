<?php

namespace App\Http\Controllers\Service;

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
	public function check(Request $request){
		$attr_id =$request->input('attr_id');
		
		$attr_check = '|'.$attr_id.'|';
		$info = DB::table('goods_stock')->select('goods_attr')->where('num',0)->whereRaw('FIND_IN_SET(?,goods_attr)', [$attr_check])->get();
		$error = [];
		foreach ($info as  $value) {
			$error[]=str_replace(',','',str_replace($attr_check, '', $value->goods_attr));
		}
		echo json_encode($error);
	}
	
	public function get_price(Request $request){
	
		$goods_attr = $request->input('goods_attr','');
		
		$goods_id = $request->input('goods_id');
		if(!empty($goods_attr)){
			$arr =explode(',', $goods_attr);
			sort($arr);
			$goods_attr = implode(',',$arr);
		}else{
			$goods_attr==null;
		}
		//dd(!empty($goods_attr));
		$sku = DB::table('goods_stock')->where('goods_attr',$goods_attr)->where('goods_id',$goods_id)->first();
		echo json_encode($sku);	
	
	}
}
