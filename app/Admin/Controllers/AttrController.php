<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use	Encore\Admin\Controllers\ModelForm;
use App\Model\Attr;
class AttrController extends Controller
{
	use ModelForm;
	public function index(){
		return Admin::content(function (Content $content) {
			$content->header('商品属性');
            $content->description('列表');
			$content->body($this->grid());
		});
	}
	public function edit($id){
		return Admin::content(function (Content $content) use ($id){
			$content->header('修改属性');
			$content->body($this->form()->edit($id));
		});
	}
	public function create(){
		return Admin::content(function (Content $content){
			$content->header('新增属性');
			$content->body($this->form());
		});
	}
	public function grid(){
		return Admin::grid(Attr::class,function(Grid $grid){
			$grid->id('属性id')->sortable();
			$grid->attr_name('属性名称')->editable();
		});
	}
	public  function form(){
		
		return Admin::form(Attr::class,function(Form $form){
			$form->display('id','商品ID');
			$form->text('attr_name',"商品名称")->editable();
		});
	}
}