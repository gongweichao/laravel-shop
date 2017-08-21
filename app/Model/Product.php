<?php

namespace App\Model;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
		 use AdminBuilder;
	protected $table = "product";
	
	public function category(){
		return $this->belongsTo(Category::class);
	}
	public function goods_attr(){
		return $this->hasMany(Goods_attr::class,'goods_id');
	}
}
