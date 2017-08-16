<?php

namespace App\Http\Controllers\Weixin;

//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Foundation\Validation\ValidatesRequests;
//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MemberController extends Controller
{

	public function show(Request $request){
		//dd(11111);
		$member = $request->session()->get('member');
		$act = "user";
		return view('weixin.user',compact('act','member'));
	}
}

