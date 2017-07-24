<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Login_user;
use App\Models\User_info;
use App\Models\Personal;
use iscms\Alisms\SendsmsPusher as Sms;
use Session;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    public function __construct(Sms $sms)
    {
        $this->sms = $sms;}

    // 用户注册认证
    public function index()
    {
        return view('home.register.register');
    }

    public function sendSms(Request $request)
    {

        //var_dump($request);die;
        $phone = $request->input('phone'); // 用户手机号，接收验证码
        //var_dump($phone);

        $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码
        $smsParams = [
            'number' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
        $request->session()->put('num', $num);  // 存入session 后面做数据验证
        $result = $this->sms->send($phone, $name, $content, $code);

        if (property_exists($request, 'result')) {            //？是否周全
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            return json_encode(['ResultData' => '发送成功', 'info' => '已发送']);
        } else {
            return json_encode(['ResultData' => '发送失败', 'info' => '请再次发送']);
        }


    }

    // 用户登录认证
    public function doRegister(Request $request)
    {
        //1.获取验证码框内数据，与接口返回的数据做比对
        $phone = $request->input('phone');
        $code = $request->input('code');
        $num = $request->session()->get('num');
        if ($num == $code) {
            $result = Login_user::where('phone', $phone)->first();
            if ($result) {
                $request->session()->put('user',$result);
                //登录成功后删除session里面的验证码，测试时可以保留不删
                //$request->session()->forget('num');
                return redirect("/shoplist");
            } else {
                $name = rand(100000, 9999999);
                //这里要开启事务
                $id = Login_user::insertGetId(['phone' => $phone, 'username' => $name, 'last_login_time' => date("Y-m-d H:i:s",time()), 'last_ip' => $request->getClientIp(), 'status' => 0]);
                $res = User_info::insert(['userid' => $id, 'name_status' => 0, 'picname' => 'test_ele.jpg', 'register_time' => date("Y-m-d H:i:s",time()), 'phone' => $phone, 'username' => $name, 'first_login_time' => date("Y-m-d H:i:s",time())]);
                $insertToPersonal = Personal::insert(['userid' => $id, 'score' => 0, 'red_packet' => 0, 'balance' => 0 ]);
                $info = Login_user::find($id);
                $request->session()->put('user',$info);
                return redirect("/shoplist");
            }
        }else{
            die("false");
        }
    }


}
