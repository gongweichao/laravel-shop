<?php

namespace App\Model; 
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{
	use ModelTree, AdminBuilder;
	protected $table = "category";
	protected $primaryKey = "id";
	
	public function product(){
		return $this->hasMany(Product::class);
	}
	public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
		$this->setParentColumn('parent_id');
        $this->setOrderColumn('category_no');
        $this->setTitleColumn('name');
    }
	
}
