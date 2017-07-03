<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder; 

class LoginController extends Controller
{
	//加载登录模板
	public function index()
	{
		
		return view("admin.login");
	}

	//加载验证码
	public function getCode()
	{
		$builder = new CaptchaBuilder();
		$builder->build(150,32);
		\Session::put('phrase',$builder->getPhrase());//存储验证码
		return response($builder->output())->header("Content-type",'image/jpeg');
	}

	//执行登录验证
	public function doLogin(Request $request)
	{
		//执行验证码判断
		$mycode = $request->input("mycode");
		$yanzhengma = $request->session()->get('phrase');
		if($mycode !==$yanzhengma){
			return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
		}

		//执行登录判断
				
		$name =$request->input("name");
		$password = $request->input("password");
			//判断是否是超级用户
			$db=\DB::table("admin_root")->get()->first();

			if($name==$db->name & $password==$db->password){
				\Session::put("adminuser",$db);
				return redirect("admin");
			}



		//获取对应普通用户信息
		$user =\DB::table("admin_user")->where("name",$name)->first();
		if(!empty($user)){
			//判断密码
			if(md5($password)==$user->password){
				//存储session跳转页面
				\Session::put("adminuser",$user);
				return redirect("admin");
			}
			}
				return back()->with("msg","账号或密码错误！");	
		}


	

	//执行退出
	public function loginOut()
	{

	}


}