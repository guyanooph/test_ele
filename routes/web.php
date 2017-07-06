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

Route::get('/register',"Home\RegisterController@index");//用户注册认证
Route::get('/doregister',"Home\RegisterController@doRegister");//用户登录认证


Route::get('/login',"Home\LoginController@index"); //加载前台登录界面
Route::post('/dologin',"Home\LoginController@doLogin"); //执行前台登录
Route::get('/logout',"Home\LoginController@logout"); //执行退出
Route::get('/getcode',"Home\LoginController@getCode"); //加载验证码

Route::get('/shoplist','Home\ShopController@index'); //商家信息列表

Route::get('/shoplist/{id}','Home\FoodController@index'); //菜品信息列表

//Route::get('/foodlist/fooddetail','Home\FoodController@list'); //菜品详情


Route::group(["prefix" => "personal","middlware" => "personal"], function () {
	
Route::get('/','Home\PersonalController@index'); //个人中心

Route::get('/order','Home\PersonalController@order'); //个人中心/个人订单
Route::get('/order/unrated','Home\PersonalController@orderUnrated'); //个人中心/个人订单/未评价订单
Route::get('/order/refund','Home\PersonalController@orderRefund'); //个人中心/个人订单/退单记录
Route::get('/red_packet','Home\PersonalController@red_packet'); //个人中心/个人资产/我的红包
Route::get('/balance','Home\PersonalController@balance'); //个人中心/个人资产/账户余额
Route::get('/score','Home\PersonalController@score'); //个人中心/个人资产/我的积分
Route::get('/info/','Home\PersonalController@userinfo'); //个人中心/个人资料
Route::get('/address/','Home\PersonalController@address'); //个人中心/地址
Route::get('/collect','Home\PersonalController@collect'); //个人中心/个人收藏

});




Route::get('/shoplist/{id}','Home\FoodController@list'); //菜品信息列表

//Route::get('/foodlist/fooddetail','Home\FoodController@list'); //菜品详情






Route::group(["prefix" => "personal","middlware" => "personal"], function () {
	
	Route::get('/','Home\PersonalController@index'); //个人中心

	Route::get('/order','Home\PersonalController@order'); //个人中心/个人订单
	Route::get('/order/unrated','Home\PersonalController@orderUnrated'); //个人中心/个人订单/未评价订单
	Route::get('/order/refund','Home\PersonalController@orderRefund'); //个人中心/个人订单/退单记录
	Route::get('/red_packet','Home\PersonalController@red_packet'); //个人中心/个人资产/我的红包
	Route::get('/balance','Home\PersonalController@balance'); //个人中心/个人资产/账户余额
	Route::get('/score','Home\PersonalController@score'); //个人中心/个人资产/我的积分
	Route::get('/info/','Home\PersonalController@userinfo'); //个人中心/个人资料
	Route::get('/address/','Home\PersonalController@address'); //个人中心/地址
	Route::get('/collect','Home\PersonalController@collect'); //个人中心/个人收藏

});



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

//加载商家登录界面
Route::get('/merchant/login',"Merchant\LoginController@login"); 
Route::get('/merchant/getcode',"Merchant\LoginController@getCode"); 
Route::post('/merchant/dologin',"Merchant\LoginController@doLogin"); 
Route::get('/merchant/logout',"Merchant\LoginController@logout"); 

Route::get('/merchant/login',"Merchant\LoginController@login"); //加载商家登录界面
Route::get('/merchant/getcode',"Merchant\LoginController@getCode"); //加载商家登录界面
Route::get("merchant/register","Merchant\RegisterController@index");////商家注册页面

 //商家后台管理
Route::group(["prefix" => "merchant","middlware" => "merchant"], function () {
	Route::get("/","Merchant\IndexController@index");//管理首页
	Route::resource('/merchantopen', "Merchant\MerchantopenController");//营业信息管理
Route::resource('/merchantopen/index', "Merchant\MerchantopenController/index");
	Route::resource("/foodtype","Merchant\FoodtypeController");//管理首页
 });