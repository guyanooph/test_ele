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
//前台路由

Route::get('/shop/add/{id}',"Home\Cart\CartController@add"); //放入购物车
Route::get('/shop/show',"Home\Cart\CartController@show"); //浏览购物车
Route::get('/shop/del/{id}',"Home\Cart\CartController@del"); //删除购物车中的某个商品
Route::get('/shop/clear',"Home\Cart\CartController@clear"); //清空购物车

Route::get('/login',"Home\LoginController@login"); //加载前台登录界面
Route::post('/dologin',"Home\LoginController@doLogin"); //执行前台登录
Route::get('/logout',"Home\LoginController@logout"); //执行退出
Route::get('/getcode',"Home\LoginController@getCode"); //加载验证码

Route::get('/shoplist','Home\ShopController@list'); //商家信息列表
Route::get('/shoplist/{id}','Home\FoodController@list'); //菜品信息列表
//Route::get('/foodlist/fooddetail','Home\FoodController@list'); //菜品详情


Route::get('/personal','Home\PersonalController@index'); //个人中心
Route::get('/personal/info','Home\PersonalController@personal'); //个人中心/个人资料
Route::get('/personal/order','Home\PersonalController@order'); //个人中心/个人订单
Route::get('/personal/assets','Home\PersonalController@assets'); //个人中心/个人资产
Route::get('/personal/collection','Home\PersonalController@collection'); //个人中心/个人收藏




//后台路由组
Route::group(["prefix" => "admin","middlware" => "admin"], function () {
	Route::get("/","Admin\IndexController@index");//后台首页
	Route::get("root","Admin\RootController@index");//超级管理员
	Route::resource("role","Admin\RoleController");//角色管理
	Route::resource("com","Admin\ComController");//普通管理员
	Route::resource("/node","Admin\NodeController");//节点管理
	Route::resource("/vip","Admin\VipController");//会员管理
	Route::resource("/shop","Admin\ShopController");//商家管理
	Route::resource("/ftype","Admin\FtypeController");//菜品分类管理
	

	Route::get("/letter","Admin\LetterController@index");//投诉管理
	Route::get("/stati","Admin\StatiController@index");//建议管理
	Route::get("/offer","Admin\OfferController@index");//建议管理

	

});
