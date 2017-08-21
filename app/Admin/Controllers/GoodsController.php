<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use App\Model\Attr;
use  App\Model\Goods_attr;
use  App\Model\Goods_stock;
use	Encore\Admin\Controllers\ModelForm;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Facades\Request;	
class GoodsController extends Controller
{
	use ModelForm;
	public function index(){
		return Admin::content(function (Content $content) {
			$content->header('商品');
            $content->description('列表');
			$content->body($this->grid()->render());
		});
	}
	//列表
	public function grid(){
		return Admin::grid(Product::class, function(Grid $grid){
		
			$grid->id('商品id')->sortable();
			$grid->name('商品名称')->editable();
			$grid->category()->name('商品分类');
			$grid->summary('商品标题')->editable();
			$grid->preview('商品图片')->image('http://www.myshop.dev/upload',50,50);
		
		});
	}
	// 修改
	public	function edit($id){
		return Admin::content(function (Content $content) use ($id){
			$content->header('修改产品分类');
			$content->body($this->form()->edit($id));
		});
	}
	
	//添加
	public function create()
	{
		return Admin::content(function (Content $content){
			$content->header('新增商品');
			$content->body($this->form());
		});
	}
	//表单
	public function form()
	{
		return Product::form(function(Form $form){
			
			$form->tab('基本属性',function(Form $form){
				$form->display('id','商品ID');
				$form->text('name',"商品名称")->editable();
				$form->text('summary',"商品标题");
				
				$form->select('category_id','商品分类')->options(function(){
					//key	
					$arr = [];
					//value
					$arr1 = [];
					$c = Category::where('parent_id',0)->get();
					foreach($c as $v ){
						array_push($arr,$v->id);
						array_push($arr1,$v->name);
						
						$c1 = Category::where('parent_id',$v->id)->get();
						
						foreach($c1 as $val){
							array_push($arr,$val->id);
							array_push($arr1,'&nbsp;&nbsp;|--'.$val->name);
						}
					} 
					//dd(array_combine($arr,$arr1));
					return array_combine($arr,$arr1);
				});
				$form->image('preview',"商品图片");
			})->tab('商品属性',function(Form $form){
				$form->hasMany('goods_attr','商品属性',function (Form\NestedForm $form){
				$form->select('属性')->options(Attr::all()->pluck('attr_name','id'));	
				$form->text('attr_val','属性值');
				$form->image('img','图片');
			});
				
			})->tab('可变商品',function(Form $form){
					
				
			})->tab('商品描述',function(Form $form){
				$form->editor('desc','描述');
			});
			
				
				
			});

	}
}
