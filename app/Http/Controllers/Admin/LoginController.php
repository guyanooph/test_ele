<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\captcha\CaptchaBuilder;

class LoginController extends Controller
{
	//加载登录模板
	public function index()
	{
		return "LL";die;
		return view("admin.login");
	}

	//执行登录验证
	public function doLogin()
	{

	}

	//执行退出
	public function loginOut()
	{

	}


}