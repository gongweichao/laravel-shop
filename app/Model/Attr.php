<?php

namespace App\Model; 

use Illuminate\Database\Eloquent\Model;

class Attr extends Model 
{
	protected $table = "attr";
	
	public function attr(){
		return $this->toMany(Goods_attr::class,'attr_id');
	}
	
}