<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\login_user;
use iscms\Alisms\SendsmsPusher as Sms;
use Session;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
     public function __construct(Sms $sms)
    {
       $this->sms=$sms;
    }
    // 用户注册认证
	public function index()
	{
		return view('home.register.register');
	}

	public function sendSms(Request $request){

			//var_dump($request);die;
	        $phone = $request ->input('phone'); // 用户手机号，接收验证码
	        //var_dump($phone);

	        $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
	        $num = rand(100000, 999999); // 生成随机验证码
	        $smsParams = [
	            'number' => "$num"
	        ];
	        $content = json_encode($smsParams); // 转换成json格式的
	        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
	        //Redis::sEtex('num',12*60,$num);
	        $request->session()->flash('num',$num);  // 存入session 后面做数据验证
	        $result=$this->sms->send($phone,$name,$content,$code);
	        //dd('aa');
	        
	        //echo "<pre>";
	        //var_dump($result);die;
	        //echo "验证码：".session('alidayu').'<br/>';
	        // if(property_exists($request,'result')){			//？是否周全
	        //     // 使用PHP函数json_encode方法将给定数组转化为JSON：
	        //     return json_encode(['ResultData' => '发送成功', 'info' => '已发送']);
	        // }else{
	        //     return json_encode(['ResultData' => '发送失败', 'info' => '请再次发送']);
	        // }


	}


	    
	

	  // 用户登录认证
	public function doRegister(Request $request)
	{
		//1.获取验证码框内数据，与接口返回的数据做比对
		$phone=$request->input('phone');
		$code=$request->input('code');
		//$num=Redis::get('num');
		$num=$request->session()->get('num');
		if ($num==$code) {
			$result=Login_user::where('phone',$phone)->first();
			if($result){
				//Redis::sEtex('result',12*60,$result);
				$request->session()->put('result',$result);
				return redirect('shoplist');
			}else{
				$name=rand(100000,9999999);
				$time=date('Y-m-d H:i:s');
				$id=Login_user::insertGetId(['phone'=>$phone,'username'=>$name,'register_time'=>$time]);
				$info=Login_user::where('id',$id)->first();
				//Redis::sEtex($info,12*60);
				$request->session()->put('info',$info);
				return redirect('shoplist');
			}
		}
		//2.比对成功则检查数据库是否存在本手机号
		//3.比对失败则提示验证码错误
		//4.如果手机号存在，则将用户信息写入session并跳转
		//5.如果手机号不存在，则将手机号存入数据库，并生成随机用户名，将用户信息写入session跳转
	}
}
