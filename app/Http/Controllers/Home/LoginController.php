<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Login_user;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    //加载登录模板
   public function login()
   {
       return view("home.login");
   }
   
   //执行用户登录
   public function doLogin(Request $request)
   {
        $user = $request->username();
        echo $user['username'].'登录成功！';
		return redirect("home/shoplist");
   }
   
   //加载验证码
   public function getCode()
   {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
   }
   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('user');
       return redirect("home/login");
   }

}
