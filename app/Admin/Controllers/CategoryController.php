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
use App\Model\Category;
class CategoryController extends Controller
{
	use ModelForm;
	public function index(){
		return Admin::content(function (Content $content) {
			$content->header('商品分类');
            $content->description('列表');
			$trees =  Category::tree(function (Tree $tree) {
			
			            $tree->branch(function ($branch) {
							//dd($branch);
			                return "{$branch['id']} - {$branch['title']} $logo";
			
			            });
			
			        });
			//dd($trees);
			$content->body($trees);
		});
	}
	public function edit($id){
		return Admin::content(function (Content $content) use ($id){
			$content->header('修改分类');
			$content->body($this->form()->edit($id));
		});
	}
	public function create(){
		return Admin::content(function (Content $content){
			$content->header('新增商品');
			$content->body($this->form());
		});
	}
	public  function form(){
		return Category::form(function(Form $form){
			$form->display('id','分类ID');
			$form->select('parent_id','所属分类')->options(Category::selectOptions());
			$form->text('name','分类名称');
		});
	}
}