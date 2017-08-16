<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;

class CategoryController extends Controller
{
	public function show(){
		$act = "category";
		$category = Category::where('parent_id','=','0')->orderby('category_no','desc')->get();
	
		$list = $this->get_tree($category);
		//dd($list);
		return view('weixin.category',compact('act','category','list'));
	}
	
	
	public function get_tree($cat){
		$arr = [];
		$arr = $cat;
		foreach ($arr as $value) {
			
			$value['child'] = Category::where('parent_id',$value->id)->get();
			if(count($value['child']) == '0'){
					
				$value['child'] = Category::where('id',$value->id)->get();

			}
			foreach ($value['child'] as  $v) {
				$v['goods'] = Product::where('category_id',$v->id)->get();
			}
		}
		return $arr;
	}
}

