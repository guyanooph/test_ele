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
        $user = \DB::table("mer_login")->where("phone",$phone)->first();
        $user2 = \DB::table("mer_register")->where("phone",$phone)->first();
        if(!empty($user)){
            //判断密码
            if(Hash::check($password, $user->password)){
                //存储session跳转页面
                if($user2->state == 2 ){
                    session()->put("merchantname",$user);
 					$data['last_login_ip'] = $request->getClientIp();
					$data['last_login_time'] = date('Y-m-d H:i:s',time());
					$id = \DB::table('mer_login')->where("shopid",$user->shopid)->update($data);
					//弥补注册表登录时间
					$res = \DB::table('mer_register')->where('id',$user->shopid)->first();
					//dd($res->first_login_time);
					if(($res->first_login_time)==null){
						$info['first_login_time'] = date('Y-m-d H:i:s',time());
						$id2 = \DB::table('mer_register')->where("id",$user->shopid)->update($info);
					}
                    return redirect("merchant");
                }elseif($user2->state == 1){
                    $list = "您的店铺还未通过审核，敬请期待！";
                    return view("errors.503", compact('list'));
                }elseif($user2->state == 3){
                    $list = "您的信息不合格，审核未通过！";
                    return view("errors.503", compact('list'));
                }else{
                    $list = "您的店铺已被冻结！";
                    return view("errors.503", compact('list'));
                }
                //echo "测试成功!";
            }
        }
        return back()->with("msg","账号或密码错误！");
		
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
