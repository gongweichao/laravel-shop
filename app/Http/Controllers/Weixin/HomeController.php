<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function show(){
		
		$act = 'home';
		
		return view('weixin.home',compact('act'));
	}
}

