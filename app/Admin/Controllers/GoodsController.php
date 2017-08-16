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
use	Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;	
use App\Model\Product;
use App\Model\Category;

class GoodsController extends Controller
{
  	use ModelForm;
	public function index()
	{
		return Admin::content(function (Content $content){
			$content->header('商品');
			$content->description('列表');
			

			$content->body($this->grid()->render());
			
			
		});
	}
	//商品列表
	public function grid(){
		return Admin::grid(Product::class,function(Grid $grid){
			$grid->id('ID')->sorttable();
			$grid->name('商品名')->editable();
			$grid->category()->name('分类');
			//dd($grid->name());
			$grid->preview('商品图片')->value(function($preview){
				return "<img src='/goods_img/".$preview."' width='50px' height='50px'/>";
			});
		});
		
	}
	//商品表单
	public function form(){
		$tab = new Tab();
		$tab->add('商品基本信息',$this->formInfo());
		$tab->add('商品属性',$this->formAttr());
		$tab->add('商品描述',$this->formDesc());
		
		return $tab;
	}
	public function formInfo(){
		return Admin::form(Product::class,function(Form $form){
			$form->display('id','商品ID');
			$form->text('name',"商品名称")->editable();
			//$form->image('preview',"商品图片");
			$form->textarea('summary','商品短描述');
		});
	}
	public function formAttr(){
		return Admin::form(Product::class,function(Form $form){
			$form->display('id','商品ID');
			$form->text('name',"商品名称")->editable();
			$form->textarea('summary','商品短描述');	
		});
	}
	public  function formDesc(){
		return Admin::form(Product::class,function(Form $form){
			$form->editor('desc');
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
	//修改
	
	
}
	