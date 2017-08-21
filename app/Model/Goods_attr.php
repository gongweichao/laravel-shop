<?php

namespace App\Model; 

use Illuminate\Database\Eloquent\Model;

class Goods_attr extends Model 
{
	protected $table = "goods_attr";
	protected $fillable = ['attr_val','img'];
	public function product(){
		return $this->belongsTo(Product::class,'goods_id');
	}
	
	public function attr(){
		return $this->belongsTo(Attr::class,'attr_id');
	}
}
