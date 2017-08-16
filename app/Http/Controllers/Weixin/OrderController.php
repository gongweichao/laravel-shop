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

class OrderController extends Controller
{
	public function order_commit(Request $request,$cart_ids){
		
		dd($cart_ids);
		return view('weixin.order');
	}
	

}

