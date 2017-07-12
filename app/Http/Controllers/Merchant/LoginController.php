<?php
namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\Merchant\Mer_login;
use App\Models\Merchant\Mer_register;
use Session;

class LoginController extends Controller
{
   //加载登录模板
   public function login()
   {
       return view("merchant.login");
   }
   
   //执行用户登录
   public function doLogin(Request $request)
   {
	   
	   //return "aaaa";
	 
        //执行验证码判断
        $mycode = $request->input("mycode");
        $yanzhengma = $request->session()->get('phrase');
        if($mycode !== $yanzhengma){
			return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
        }
        
        //执行登陆判断
        $phone = $request->input("phone");
        $password = $request->input("password");
        //获取对应用户信息
        $user = Mer_login::where("phone",$phone)->first();
        $state = Mer_register::where("phone",$phone)->first();
		//dd($state->state);
		if($state->state != 1){
			if(!empty($user)){
			//判断密码
				if(Hash::check($password, $user->password)){
					//存储session跳转页面
					session()->put("merchantname",$user);
					
					$data['last_login_ip'] = $request->getClientIp();
					$data['last_login_time'] = date('Y-m-d');
					$id = \DB::table('mer_login')->where("shopid",$user->shopid)->update($data);
					
					return redirect("merchant");
					//echo "测试成功!";
				}
			}
			return back()->with("msg","账号或密码错误！");
		}else{
			$list = "账号正在审核！如有疑问，请拨打：7417417474741";
			return view('errors.503',compact('list'));
			//return "账号正在审核！";
		}
        
		
   }
   
   //加载验证码
   public function getCode()
   {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        \Session::put('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
   }
   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('merchantname');
       return redirect("merchant/login");
   }
}
