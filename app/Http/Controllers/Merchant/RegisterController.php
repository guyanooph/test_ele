<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Mer_register;
use App\Org\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis as redis;
// 引入阿里大鱼命名空间
use iscms\Alisms\SendsmsPusher as Sms;
class RegisterController extends Controller
{
    //阿里大鱼
//    public $sms;
//
//    public function __construct()
//    {
//        $this->sms = $sms;
//    }


    public function sendMobileCode(Request $request)
    {
//        echo "bb";
//        die();
        // 去用户登录表里边查询
//        echo $request['tel'];
//        die();
        $result = \DB::table('mer_register')->find(['phone' => $request['tel']]);
        //$result = \DB::table('mer_register')->where('phone',$request['tel'])->first();
         //echo $result;
        //die();
        if ($result) {
            // 返回错误信息
            //dd('ok');
            return responseMsg('手机号码已注册!', 400);
        }
        // 调用发送验证码 代码片段
        $smsResult = $this->codeSnippet->mobileCodeForSms($request['tel'], config('subassembly.autograph'), config('subassembly.template_id'));
        if (!is_bool($smsResult)) {
            return responseMsg($smsResult, 400);
        }
        return responseMsg('验证码已发送!');

    }

    public function code(Request $request)
    {
        $input = $request->all(); // 判断该手机在10分钟内是否已经发过短信
//        $exists = \Redis::exists('IT:STRING:USER:CODE:'.$input['phone']);
//        if($exists === true){
//            return response()->json(['ResultData '=> '失败', 'info' => '重复发送']);
//        }
// 生成随机号码
        $num = rand(100000,999999); // 组装参数
        $smsParams = [
            'code' => $num,
            'product' => '案例展示'
        ];
        // 需要参数
        $phone = $input['phone'];
        $name = '注册验证';
        $content = json_encode($smsParams);
        $code = 'SMS_3166316'; // 发送验证码方法
        $data = $this->sms->send($phone, $name, $content, $code); // 检查对象是否具有 result 属性
        if(property_exists($data, 'result')){
            // 设置一个 60 秒过期的 Redis String 类型
//            \Redis::sEtex('IT:STRING:USER:CODE:' . $phone, 600, $num);
            return response()->json(['ResultData' => '成功', 'info' => '已发送']);
        }else{
            return response()->json(['ResultData' => '失败', 'info' => '重复发送']);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载注册页面
    public function index()
    {
        //
        //$list = array('id'=>1,'content'=>'注册成功');
//        return view('merchant.register.index',compact('$list'));
        //return view('merchant.register.index',［'list'=>""］);
        return view("merchant.register.phone");
    }

    public function register()
    {
        return view("merchant.register.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * 发送手机验证码
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */



    //检验商户用户名
    public function ver(Request $request){
        $mername = $request->input('mername');
        $res= \DB::table('mer_register')->where('mername',$mername)->first();
        if($res){
            echo "y";
        }else{
            echo "n";
        }
    }

    //检验商户店铺名
    public function ver_s(Request $request){
        $shoptitle = $request->input('shoptitle');
        $res= \DB::table('mer_register')->where('shoptitle',$shoptitle)->first();
        if($res){
            echo "y";
        }else{
            echo "n";
        }
    }

    //检验手机号码
    public function ver_p(Request $request){
        $phone = $request->input('phone');
        $res= \DB::table('mer_register')->where('phone',$phone)->first();
        if($res){
            echo "y";
        }else{
            echo "n";
        }
    }



    //检验身份证号码
    public function ver_i(Request $request){
        $identity = $request->input('identity');
        $res= \DB::table('mer_register')->where('identity',$identity)->first();
        if($res){
            echo "y";
        }else{
            echo "n";
        }
    }

    public function store(Request $request)
    {

        \DB::beginTransaction();    // 事物开始
        try {
            // 密码处理
            $password = trim($request['password']);
            // 俩次密码判断
            if ($password != $request['repassword']) {
                // 返回错误信息
                return responseMsg('两次密码输入不一致', 400);
            }

            if ($request->file('picname') && $request->file('picname')->isValid()) {
                $file = $request->file('picname');
                $ext = $file->extension();
                $filename = time() . rand(10000, 9999) . "." . $ext;
                $file->move("./upload/", $filename);
            }

            if ($request->file('logoname') && $request->file('logoname')->isValid()) {
                $file = $request->file('logoname');
                $ext = $file->extension();
                $filename = time() . rand(10000, 9999) . rand(10000, 9999) . "." . $ext;
                $file->move("./upload/", $filename);
            }



            //商家注册表
            $input = $request->only(['mername', 'password', 'shoptitle', 'phone', 'identity', 'username', 'picname', 'logoname']);
            //$password = md5($input['password']);
            //$password = md5(substr_replace($password, $input['phone'], 0, 4));
            //$password = Crypt::encrypt($input['password']);
            //dd($password);
            $password = HASH::make($input['password']);
            //die();
            $input['password'] = $password;
            $input['first_ip'] = $request->getClientIp();
            $input['register_time'] = date("Y-m-d H:i:s", time());
            $res1 = \DB::table('mer_register')->InsertGetId($input);
            //dd($res1);
            //商家登录表
            $info['shopid'] = $res1;
            $info['phone'] = $input['phone'];
            $info['password'] = $input['password'];
            $info['shopname'] = $input['shoptitle'];
            $res2 = \DB::table('mer_login')->InsertGetId($info);

            //商家表
            $data['shopid'] = $info['shopid'];
            $data['shopname'] = $info['shopname'];
            $data['logo'] = $input['logoname'];
            $data['phone'] = $input['phone'];
            $res3 = \DB::table('merchant')->InsertGetId($data);

            $res = $res1 && $res2 && $res3;
            if ($res) {
                \DB::commit();
            }
        }catch(\PDOException $e) {
            \DB::rollback();
            $list = "有点问题，再来注册吧(其实是事务回滚)";
            return view('errors.503', compact('list'));
        };
        $list = "恭喜您！旺铺正在审核中，请等待!";
        return view('errors.503', compact('list'));
    }

//        $flight->save();
//        return view('merchant.login',['merchant_register',$merchant_register]);

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function resize()
//    {
//        //静态类的方法
//        Image::imageResize("1.jpg","./img/",100,100,"s_");
//    }

    public function test()
    {
//        $a = Crypt::encrypt("12");
//        $b = Crypt::encrypt('3j&*gfdA2A_6h@lngfr5');
//        dd(strlen($b));
//        $c = Crypt::decrypt($b);
//        $c = \HASH($b);
//        dd($c);
        $a = Hash::make('1234Ae&$fguhjswdefrghujkldergthyujkbfjbwejfbwjebfkjbewjkfbewkj3sd!');
        dd(strlen($a));

    }
}
