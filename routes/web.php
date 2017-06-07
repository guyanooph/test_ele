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

Route::get('/', function () {
    return view('welcome');
});
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