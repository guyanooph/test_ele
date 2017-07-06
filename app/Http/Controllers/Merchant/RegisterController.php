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
//导入七牛相关类
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use zgldh\QiniuStorage\QiniuStorage;


class RegisterController extends Controller
{
    //阿里大鱼

    public function __construct(Sms $sms)
    {
        $this->sms=$sms;
    }

    public function sendSms(Request $request){
        $phone = $request ->input('phone','15138958851'); // 用户手机号，接收验证码
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

//            if ($request->hasFile('picname')) {
//                $file = $request->file('picname');
//                $disk = QiniuStorage::disk('qiniu');
//                $filename = md5($file->getClientOriginalName() . time() . rand()). "." . $file->getClientOriginalExtension();
//                $bool = $disk->put('upload/image' . $filename, file_get_contents($file->getRealPath()));
//                //dd($bool);
//                if ($bool) {
//                    $path = $disk->downloadUrl('upload/image' . $filename);
//                    //return "上传成功,图片UR:" . $path;
//                }else{
//                    return "上传失败";
//                }
//            } else {
//                return "没有文件1";
//
//            }
//
//            if ($request->hasFile('logoname')) {
//                $file = $request->file('logoname');
//                $disk = QiniuStorage::disk('qiniu');
//                $filename2 = md5($file->getClientOriginalName() . time() . rand()). "." . $file->getClientOriginalExtension();
//                //上传到七牛
//               // dd($filename2);
//                $bool = $disk->put('iwanli/image_' . $filename2, file_get_contents($file->getRealPath()));
//                if ($bool) {
//                    $path = $disk->downloadUrl('iwanli/image_' . $filename2);
//                    //return "上传成功,图片UR:" . $path;
//                }else{
//                    return "上传失败2";
//                }
//            } else {
//                return "没有文件2";
//
//            }

            //dd($filename2);


                if ($request->file('picname') && $request->file('picname')->isValid()) {
                    //获取上传文件信息
                    $file = $request->file('picname');
                    $ext = $file->extension(); //获取文件的扩展名
                    //随机一个新的文件名
                    $filename = time().rand(1000,9999).".".$ext;
                    //移动上传文件
                    $file->move("./upload/merchant/food/",$filename);
                    $data['picname'] = $filename;
                    //return response($filename); //输出
                    //exit();
                }



                //商家注册表
                $input = $request->only(['mername', 'password', 'shoptitle', 'phone', 'identity', 'username']);
                //$password = md5($input['password']);
                //$password = md5(substr_replace($password, $input['phone'], 0, 4));
                //$password = Crypt::encrypt($input['password']);
                //dd($password);
                $password = HASH::make($input['password']);
                //die();
                $input['picname'] = $filename;
                 $input['logoname'] = $filename2;
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
            }
        catch(\PDOException $e) {
                \DB::rollback();
                $list = "有点问题，再来注册吧(其实是事务回滚)";
                return view('errors.503', compact('list'));
            };
        $list = "恭喜您！旺铺正在审核中，请等待!";
        return view('errors.503', compact('list'));
    }


//    private function getToken(){
//        $accessKey='hH3F_cleOBuZwkc9ZBsL5uKzFMuQ7lXWOH_crtQZ';
//        $secretKey='2Nz_IZESBjB4WVPBOMbqXFGxc4dlqeJFaUa-woF0';
//        $auth=new Auth($accessKey, $secretKey);
//        $bucket='test-ele';//上传空间名称
//        //设置put policy的其他参数
//        //$opts=['callbackUrl'=>'http://www.callback.com/','callbackBody'=>'name=$(fname)&hash=$(etag)','returnUrl'=>"http://www.baidu.com"];
//        return $auth->uploadToken($bucket);//生成token
//    }



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

    public function a()
    {
        return view('merchant.a');
    }




    public function test(Request $request)
    {
//        //dd($_FILES);
//        if ($request->hasFile('pic')) {
//            $file = $request->file('pic');
//            $disk = QiniuStorage::disk('qiniu');
//            $filename = md5($file->getClientOriginalName() . time() . rand()). "." . $file->getClientOriginalExtension();
//            //dd($file->getClientOriginalExtension());
//            //上传到七牛
//            //dd($filename);
//            $bool = $disk->put('upload/image' . $filename, file_get_contents($file->getRealPath()));
//            //dd($bool);
//            if ($bool) {
//                $path = $disk->downloadUrl('upload/image' . $filename);
//                return "上传成功,图片UR:" . $path;
//            }
//            return "上传失败";
//        } else {
//            return "没有文件";
//
//        }
        if($request->hasFile('pic')) {
            //获取文件，file对应的是前端表单上传input的name
            $file =$request->file("pic");
            //初始化
            $disk = \Storage::disk("qiniu");


            //重命名文件
            $fileName  =md5($file->getClientOriginalName().time().rand()).".".$file->getClientOriginalExtension();
            // return 'd';
            //上传到七牛
            $bool = $disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
            //判断是否上传成功
            if($bool){
                $path = $disk->downloadUrl('iwanli/image_'.$fileName);
                return '上传成功;图片URL：'.$path;
            }
            return '上传失败';
        }
        return '没有文件';
    }



}
