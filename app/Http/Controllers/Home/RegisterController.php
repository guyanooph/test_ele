<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\login_user;

class RegisterController extends Controller
{
    // 用户注册认证
	public function index()
	{
		return view('home.register');
	}

	
	  // 用户登录认证
	public function doRegister(Request $request)
	{
		//1.获取验证码框内数据，与接口返回的数据做比对
		$number=$request->input('tel');
		//2.比对成功则检查数据库是否存在本手机号
		//3.比对失败则提示验证码错误
		//4.如果手机号存在，则将用户信息写入session并跳转
		//5.如果手机号不存在，则将手机号存入数据库，并生成随机用户名，将用户信息写入session跳转
		return redirect(home.shop.shoplist);
	}
}
