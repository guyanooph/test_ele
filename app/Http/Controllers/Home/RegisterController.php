<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\login_user;
use iscms\Alisms\SendsmsPusher as Sms;

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
	        $phone = $request ->input('phone','13161610031'); // 用户手机号，接收验证码
	        $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
	        $num = rand(100000, 999999); // 生成随机验证码
	        $smsParams = [
	            'number' => "$num"
	        ];
	        $content = json_encode($smsParams); // 转换成json格式的
	        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
	        //$request ->session()->put('alidayu',$num);  // 存入session 后面做数据验证
	        $result=$this->sms->send($phone,$name,$content,$code);
	        //dd('aa');
	        echo "<pre>";
	        var_dump($result);die;
	        echo "验证码：".session('alidayu').'<br/>';
	        if(property_exists($request,'result')){
	            // 使用PHP函数json_encode方法将给定数组转化为JSON：
	            return json_encode(['ResultData' => '成功', 'info' => '已发送']);
	        }else{
	            return json_encode(['ResultData' => '失败', 'info' => '重复发送']);
	        }

	    }
	/*public function Alidayu(Request $request)
	{
	    //return "aa";
	    //$phone = $request ->input('phone','13161610031'); // 用户手机号，接收验证码
	    $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
	    $num = rand(100000, 999999); // 生成随机验证码
	    $smsParams = [
	        'number' => "$num"
	    ];
	    $number = json_encode($smsParams); // 转换成json格式的
	    $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
	    $request ->session()->put('alidayu',$num);  // 存入session 后面做数据验证
	    //var_dump($request);

	    $result=$this->sms->send(13161610031,$name,$number,$code);
	    echo "<pre>";
	    var_dump($result);die;
	    echo "验证码：".session('alidayu').'<br/>';
	    if(property_exists($request,'result')){
	       // 使用PHP函数json_encode方法将给定数组转化为JSON：
	        return json_encode(['ResultData' => '成功', 'info' => '已发送']);
	    }else{
	        return json_encode(['ResultData' => '失败', 'info' => '重复发送']);
	    }
	}    
*/
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
