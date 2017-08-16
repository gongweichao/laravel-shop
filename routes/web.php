<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Weixin\HomeController@show');
Route::get('/category', 'Weixin\CategoryController@show');
Route::get('/user','Weixin\MemberController@show');
Route::get('/goods/{id}','Weixin\GoodsController@show');
Route::get('/service/goods/check','Service\GoodsController@check');
Route::get('/service/goods/get_price','Service\GoodsController@get_price');
Route::get('/service/addcart','Service\CartController@addcart');
Route::get('/service/get_allprice','Service\CartController@get_allprice');
Route::get('/service/cart_del','Service\CartController@cart_del');
Route::get('/seach','Weixin\SeachController@show');
Route::get('/cart','Weixin\CartController@show');

Route::get('/test','Service\CaptchaController@getcaptcha');
Route::post('/service/regist','Service\CaptchaController@regist');
Route::post('/service/login','Service\CaptchaController@login');

Route::get('/login', 'Weixin\LoginController@show');
Route::get('/regist', 'Weixin\RegistController@show');
Route::group(['middleware'=>'check.login'],function(){
	Route::get('/order_commit/{cart_ids}', 'Weixin\OrderController@order_commit');
});
Route::get('/text','Controller@show');


Route::group(['middleware' => ['cors']], function () {
    Route::get('api/getCategoryList','ApiController@categorylist');
	Route::get('api/get_cat','ApiController@allcat');
});