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
		
		
	}
	  // 用户登录认证
	public function doRegister()
	{
		$user = $request->user();
        echo $user['name'].'登录成功！';
	}
}
