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

//Route::get('/shop/add/{id}',"Home\CartController@add"); //放入购物车
//Route::get('/shop/show',"Home\CartController@show"); //浏览购物车
//Route::get('/shop/del/{id}',"Home\CartController@del"); //删除购物车中的某个商品
//Route::get('/shop/clear',"Home\CartController@clear"); //清空购物车

Route::get('/login',"Home\LoginController@login"); //加载前台登录界面
Route::post('/dologin',"Home\LoginController@doLogin"); //执行前台登录
Route::get('/logout',"Home\LoginController@logout"); //执行退出
Route::get('/getcode',"Home\LoginController@getCode"); //加载验证码

Route::get('/shoplist','Home\ShopController@list'); //商家信息列表

Route::get('/shoplist/{id}','Home\FoodController@list'); //菜品信息列表

//Route::get('/foodlist/fooddetail','Home\FoodController@list'); //菜品详情



Route::get('/personal','Home\PersonalController@index'); //个人中心



Route::get('/personal/order','Home\PersonalController@order'); //个人中心/个人订单
Route::get('/personal/order/unrated','Home\PersonalController@orderUnrated'); //个人中心/个人订单/未评价订单
Route::get('/personal/order/refund','Home\PersonalController@orderRefund'); //个人中心/个人订单/退单记录
Route::get('/personal/red_packet','Home\PersonalController@red_packet'); //个人中心/个人资产/我的红包
Route::get('/personal/balance','Home\PersonalController@balance'); //个人中心/个人资产/账户余额
Route::get('/personal/score','Home\PersonalController@score'); //个人中心/个人资产/我的积分
Route::get('/personal/info/','Home\PersonalController@userinfo'); //个人中心/个人资料
Route::get('/personal/address/','Home\PersonalController@address'); //个人中心/地址

Route::get('/personal/collect','Home\PersonalController@collect'); //个人中心/个人收藏




//后台路由组
Route::group(["prefix" => "admin","middlware" => "admin"], function () {
	Route::get("/","Admin\IndexController@index");//后台首页
	Route::get("root","Admin\RootController@index");//超级管理员
	Route::resource("role","Admin\RoleController");//角色管理
	Route::resource("user","Admin\UserController");//普通管理员
	Route::resource("node","Admin\NodeController");//节点管理
	Route::resource("vip","Admin\VipController");//会员管理
	Route::resource("shop","Admin\ShopController");//商家管理
	Route::resource("ftype","Admin\FtypeController");//菜品分类管理
	

	Route::get("/letter","Admin\LetterController@index");//投诉管理
	
	Route::get("/offer","Admin\OfferController@index");//建议管理
Route::get("/stati","Admin\StatiController@index");//统计管理
	

});
