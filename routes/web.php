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
Route::get("/home", "Home\LocationController@location");  //定位页面
Route::get("/setlocationsession", "Home\LocationController@setLocationSession");  //定位页面
ROute::get("/personal/test", "Home\PersonalController@test"); //test
//以下所有前台路由均经过一个定位中间件,在中间件里检测session是否有定位信息，没有就重定向到定位页面
Route::group(['middleware'=>'location'], function(){
    Route::get("/", "Home\ShopController@index"); //前台主页，附近商家列表
    //购物车,
    Route::get('/addtocart/{shopid}/{foodid}', 'Home\ShopcartController_2@addCart')->middleware("shopcart");
    Route::get('/clearcart/{shopid}', 'Home\ShopcartController_2@clearCart')->middleware("shopcart");
    Route::get("/{shopid}/ordercheckout", "Home\OrderController@index")->middleware("personal","shopcart");
    
    Route::get('/register',"Home\RegisterController@index");//用户注册认证
    Route::get('/register/sendmessage',"Home\RegisterController@sendSms");//用户注册认证
    
    
    Route::post('/doregister',"Home\RegisterController@doRegister");//用户登录认证
    
    
    Route::get('/login',"Home\LoginController@index"); //加载前台登录界面
    Route::post('/dologin',"Home\LoginController@doLogin"); //执行前台登录
    Route::get('/logout',"Home\LoginController@logout"); //执行退出
    Route::get('/getcode',"Home\LoginController@getCode"); //加载验证码
    Route::get('/shoplist','Home\ShopController@index'); //附近商家信息列表，同/
    Route::get('/shoplist/{id}','Home\FoodController@index'); //菜品信息列表
    
    //个人中心
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
    	Route::get('/security','Home\PersonalController@security'); //安全设置
    	Route::get('/logout','Home\PersonalController@logout'); //安全设置
    
    });
});


//后台路由组
Route::get("/ad/login","Admin\LoginController@index");//加载登录页面
Route::get('/ad/getcode',"Admin\LoginController@getCode");//加载验证码
Route::post('/ad/dologin',"Admin\LoginController@doLogin");//执行登录判断
Route::get("admin/login/logOut","Admin\LoginController@loginOut");//退出
Route::get("/admin/login/verify/{pho}","Admin\LoginController@Verify");//发送手机验证信息
Route::post("/ad/plogin","Admin\LoginController@plogin");//执行手机验证


Route::group(["prefix" => "admin","middleware" => "admin"], function () {
	Route::get("/","Admin\IndexController@index");//后台首页

	Route::get("root","Admin\RootController@index");//超级管理员

	//Route::resource("user","Admin\UserController");//普通管理员
	Route::get("user","Admin\UserController@index");//普通管理员首页
	Route::get("user/create","Admin\UserController@create");//普通管理员添加模板
    Route::post("user","Admin\UserController@store");//普通管理员执行添加

	Route::get("user/edit/{id}","Admin\UserController@edit");//普通管理员添加编辑模板
	Route::put("user/{id}","Admin\UserController@update");//执行普通管理员修改
	Route::resource("user","Admin\UserController");//执行普通管理员删除

	Route::get("role","Admin\RoleController@index");//角色管理首页
	Route::get("role/create","Admin\RoleController@create");//角色加载添加页
	Route::post("role","Admin\RoleController@store");//角色执行添加
	Route::get("role/edit/{id}","Admin\RoleController@edit");//加载角色编辑模板
	Route::put("role/{id}","Admin\RoleController@update");//执行角色修改
	Route::delete('/role/destroy/{id}',"Admin\RoleController@destroy");//角色删除操作
	Route::get("role/loadNode/{id}","Admin\RoleController@loadNode");//加载节点分配模板	
	//Route::post("role/saveNode","Admin\RoteController@saveNode");//保存节点信息
	Route::post("role/saveNode",function(){
		return "dd";
	});//保存节点信息
	
	
	//Route::resource("node","Admin\NodeController");//节点管理
	Route::get("node","Admin\NodeController@index");//节点管理首页
	Route::post("node","Admin\NodeController@store");//执行节点添加
	Route::get("node/edit/{id}","Admin\NodeController@edit");//加载节点修改

	Route::put("node/{id}","Admin\NodeController@update");//执行节点修改
	
	Route::delete("node/{id}","Admin\NodeController@destroy");//节点删除
	Route::get("vip","Admin\VipController@index");//加载会员信息页面
	Route::get("shop/index","Admin\ShopController@index");//待审核商家管理页面
	Route::get("shop/detail/{id}","Admin\ShopController@detail");//待审核商家详情
    Route::get("shop/check/{id}/{state}","Admin\ShopController@check");//商家审核操作

    Route::get("shopCom","Admin\ShopController@indexCom");//加载普通商家信息
    Route::get("shop/detailCom/{id}","Admin\ShopController@detailCom");//加载普通商家详情信息
    Route::get("shop/checkCom/{id}/{state}","Admin\ShopController@checkCom");//违规商家手动处理



	Route::get("ftype","Admin\FtypeController@index");//菜品分类加载页面
	Route::post("ftype","Admin\FtypeController@store");//菜品分类执行添加
	Route::get("ftype/edit/{id}","Admin\FtypeController@edit");//菜品分类加载模板
	//Route::put("ftype/{id}","Admin\FtypeController@update");//菜品分类执行修改
	Route::put("ftype/{id}",function(){
		return "dd";
	});//菜品分类执行修改
	
	
	Route::post('ftype/storyEr',"Admin\FtypeController@storyEr");//执行子类别添加
	
	//Route::resource("ftype","Admin\FtypeController");//菜品分类删除,用delete没删掉
	Route::get("/ftypeb","Admin\FtypebController@index");//菜品子分类加载页面
	Route::delete("/ftypeb/destroy/{id}","Admin\FtypebController@destroy");//菜品子分类删除
	Route::get("ftypeb/doEdit","Admin\FtypebController@doEdit");//ajax编辑子分类时查找父类title

    Route::get("/letter","Admin\LetterController@index");//投诉管理
    Route::get("/offer","Admin\OfferController@index");//建议管理
    Route::get("/stati","Admin\StatiController@index");//统计管理
});

//加载商家登录界面
 
Route::post('/merchant/dologin',"Merchant\LoginController@doLogin"); 
Route::get('/merchant/logout',"Merchant\LoginController@logout"); 
Route::get('/merchant/login',"Merchant\LoginController@login"); //加载商家登录界面
Route::get('/merchant/getcode',"Merchant\LoginController@getCode"); //加载商家登录界面
Route::get('/merchant/getcode',"Merchant\LoginController@getCode"); //加载商家登录界面


//商家注册
Route::get("merchant/phone","Merchant\RegisterController@index");//加载商家手机注册页面
Route::post("merchant/ver_tel","Merchant\RegisterController@ver_tel");//手机验证码验证手机号是否已经被用
Route::post("code","Merchant\RegisterController@code");//验证code并返回详细商家注册页
Route::get("code","Merchant\RegisterController@code");//验证code并返回详细商家注册页
//Route::get("sid","Merchant\RegisterController@sids");//验证code并返回详细商家注册页
Route::get("sid/{id}","Merchant\RegisterController@sids");//验证code并返回详细商家注册页
Route::get("/sendMobileCode","Merchant\RegisterController@sendMobileCode");//发送手机验证码


//Route::get('merchant/register/sendsms', 'Merchant\RegisterController@sendSms');//发送手机验证码
Route::get('merchant/register','Merchant\RegisterController@register');//加载详细注册信息
Route::post("merchant/register","Merchant\RegisterController@store");////商家执行注册
Route::post("merchant/ver","Merchant\RegisterController@ver");//注册用户名验证
Route::post("merchant/ver_s","Merchant\RegisterController@ver_s");//注册商铺名验证
Route::post("merchant/ver_p","Merchant\RegisterController@ver_p");//注册手机号码验证
Route::post("merchant/ver_i","Merchant\RegisterController@ver_i");//注册身份证号码验证

//测试图片缩放
//Route::get("merchant/register1","Merchant\RegisterController@resize");
Route::get('a','Merchant\RegisterController@a');
Route::post('/test','Merchant\RegisterController@test');
//Route::get('test',function (){
//    return view('merchant.register.test');
//});

//商家后台管理
Route::group(["prefix" => "merchant","middleware" => "merchant"], function () {
	Route::get("/","Merchant\IndexController@index");//管理首页
	
	Route::get("/merchant","Merchant\MerchantController@index");//商家信息首页
	Route::get("/merchant/edit/{shopid}","Merchant\MerchantController@edit");//编辑商家信息
	Route::put("/merchant/update/{shopid}","Merchant\MerchantController@update");//执行修改商家信息
	
	Route::get('/merchantopen', "Merchant\MerchantopenController@index");//营业信息管理
	Route::get('/merchantopen/edit/{shopid}', "Merchant\MerchantopenController@edit");//修改营业信息
	Route::put('/merchantopen/update/{shopid}', "Merchant\MerchantopenController@update");//执行修改

	Route::get('/order', "Merchant\OrderController@index");//订单信息管理
	Route::get('/order/create', "Merchant\OrderController@create");//添加订单
	Route::post('/order', "Merchant\OrderController@store");//执行添加
	Route::delete('/order/destroy/{id}', "Merchant\OrderController@destroy");//执行删除
	Route::get('/order/edit/{id}', "Merchant\OrderController@edit");//修改订单信息页
	Route::post('/order/update/{id}', "Merchant\OrderController@update");//执行修改
	
	Route::get("/foodtype","Merchant\FoodtypeController@index");//管理菜单分类首页
	Route::get("/foodtype/create","Merchant\FoodtypeController@create");//添加菜单分类
	Route::post("/foodtype/store","Merchant\FoodtypeController@store");//执行添加
	Route::get("/foodtype/edit/{id}","Merchant\FoodtypeController@edit");//修改菜单分类
	Route::put("/foodtype/update/{id}","Merchant\FoodtypeController@update");//执行修改
	Route::delete("/foodtype/destroy/{id}","Merchant \FoodtypeController@destroy");//执行修改
	
	Route::get("/food","Merchant\FoodController@index");//管理首页
	Route::get("/food/create","Merchant\FoodController@create");//管理菜的添加
	Route::post("/food/store","Merchant\FoodController@store");//执行添加
	Route::get("/food/edit/{id}","Merchant\FoodController@edit");//修改菜单
	Route::put("/food/update/{id}","Merchant\FoodController@update");//修改菜单
	Route::delete("/food/destroy/{id}","Merchant\FoodController@destroy");//修改菜单
});

