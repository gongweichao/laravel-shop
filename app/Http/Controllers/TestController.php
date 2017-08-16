<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller
{
	public function show(){
		
		$info = DB::table('test')->get();
		dd($info);
	}
}
