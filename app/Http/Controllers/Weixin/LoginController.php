<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function show(){
		
		$act = 'user';
		
		return view('weixin.login',compact('act'));
	}
}

