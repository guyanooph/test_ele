<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Controllers\Controller;
use iscms\Alisms\SendsmsPusher as Sms;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
	//自动加载（构造方法）
	public function __construct(Sms $sms)
	{
		$this->sms = $sms;
	}
	
	//加载验证码
	public function sendSms(Request $request){
		$phone = $request->input('phone',15324213652);//用户手机号，接收验证码
		$name = '兄弟连';//短信签名，可以在阿里大鱼的管理中心看到
		$num = rand(100000,999999);//生成验证码
		$smsParams = ['number' => "$num"];
		$content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
        //$request ->session()->put('alidayu',$num);  // 存入session 后面做数据验证
        $result=$this->sms->send($phone,$name,$content,$code);
        //dd('aa');
        echo "<pre>";
        //var_dump($result);die;
        echo "验证码：".session('alidayu').'<br/>';
        if(property_exists($request,'result')){
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            return json_encode(['ResultData' => '成功', 'info' => '已发送']);
        }else{
            return json_encode(['ResultData' => '失败', 'info' => '重复发送']);
        }
		return view("merchants.index");
	}
}
