<?php

namespace App\Http\Controllers\Merchant;
use  Illuminate\Support\Facades\Redis;
//use Redis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Mer_register;
use App\Models\Merchant\Mer_login;
use App\Org\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
// 引入阿里大鱼命名空间
use iscms\Alisms\SendsmsPusher as Sms;
//导入七牛相关类
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use App\Org\Geohash;
use App\Models\Mer_sid;
use App\Models\Mer_mid;

//define('SETS_MERCHANT','SETS:MERCHAN');//商家用户集合

class RegisterController extends Controller
{
    //阿里大鱼

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }


    public function sendMobileCode(Request $request)
    {
        $phone = $request->input('tel', '15138958851'); // 用户手机号，接收验证码`
        $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码
        $smsParams = [
            'number' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
        //$request ->session()->put('alidayu',$num);  // 存入session 后面做数据验证
        $result = $this->sms->send($phone, $name, $content, $code);
        //指定时间销毁
        \Redis::sEtex($phone, 15 * 60, $num);
    }

    public function code(Request $request)
    {
        //获取键
        $phone = $request->input('tel');
        //获取指定键的值
        $Rcode = \Redis::get($phone);
        //对比用户输入的验证码与REDIS存储的验证码
        if ($request->input('code') == $Rcode) {
            $mids = \DB::table('mer_mid')->get();
           // $mids = \Redis::
            return view('merchant.register.index', ['mids' => $mids]);
        } else {
            echo "code_error";
        }

    }
    //加载商家分类
    public function sids($id)
    {
        //$id = $request->input('id');
        //dd($id);
        $sid = Mer_sid::where('mid', $id)->get();
        $sids = $sid->toJson();
        return $sids;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * 发送手机验证码
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */


    //检验商户用户名
    public function ver(Request $request)
    {
        $mername = $request->input('mername');
        $key = SETS_MERCHAN_MERNAME;
        /*
        $res = \DB::table('mer_register')->where('mername', $mername)->first();
        //$res = \Redis::exists();
        if ($res) {
            return 1;
        } else {
            return;
        }
        */
        $res = \Redis::sismember($key,$mername);
        if ($res) {
            return 1;
        }else{
            return;
        }
    }

    //检验商户店铺名
    public function ver_s(Request $request)
    {
        $shoptitle = $request->input('shoptitle');
        $key = SETS_MERCHAN_SHOPTITLE;
        $res = \Redis::sismember($key,$shoptitle);
        if ($res) {
            return 1;
        }else{
            return;
        }
        /*
        $res = \DB::table('mer_register')->where('shoptitle', $shoptitle)->first();
        if ($res) {
            return 1;
        } else {
            return;
        }
        */
    }

    //检验手机号码验证码
    public function ver_tel(Request $request)
    {
        $tel = $request->input('tel');
        $res = \DB::table('mer_register')->where('phone', $tel)->first();
        if ($res) {
            return 1;
        } else {
            return;
        }
    }

    //检验手机号码
    public function ver_p(Request $request)
    {
        $phone = $request->input('phone');
        $key = SETS_MERCHAN_PHONE;
        $res = \Redis::sismember($key,$phone);
        if ($res) {
            return 1;
        }else{
            return;
        }
        /*
        $res = \DB::table('mer_register')->where('phone', $phone)->first();
        if ($res) {
            return 1;
        } else {
            return;
        }
        */
    }


    //检验身份证号码
    public function ver_i(Request $request)
    {
        $identity = $request->input('identity');
        $key = SETS_MERCHAN_IDENTITY;
        $res = \Redis::sismember($key,$identity);
        if ($res) {
            return 1;
        }else{
            return;
        }

       /*
       $res = \DB::table('mer_register')->where('identity', $identity)->first();
        if ($res) {
            return 1;
        } else {
            return;
        }
       */
    }

    public function store(Request $request)
    {
        $t1 = microtime();
        $geohash = new Geohash();
        
       /* \DB::beginTransaction();    // 事物开始
        try {*/
            
            // 密码处理
            $password = trim($request['password']);
            // 俩次密码判断
            if ($password != $request['repassword']) {
                // 返回错误信息
                return responseMsg('两次密码输入不一致', 400);
            }
            //七牛文件上传

            if ($request->hasFile('picname')) {
                $file = $request->file('picname');
                $disk = \Storage::disk('qiniu');
                $filename = md5($file->getClientOriginalName() . time() . rand()). "." . $file->getClientOriginalExtension();
                $bool = $disk->put('upload/image' . $filename, file_get_contents($file->getRealPath()));
                //dd($filename);
                if ($bool) {
                    $path = $disk->downloadUrl('upload/image'. $filename);
                    //dd($path);
                    //return "上传成功,图片UR:" . $path;
                }else{
                    return "上传失败1";
                }
            } else {
                return "没有文件1";

            }
            
            if ($request->hasFile('logoname')) {
                $file = $request->file('logoname');
                $disk = \Storage::disk('qiniu');
                $filename2 = md5($file->getClientOriginalName() . time() . rand()). "." . $file->getClientOriginalExtension();
                $bool = $disk->put('upload/image' . $filename2, file_get_contents($file->getRealPath()));
                //dd($bool);
                if ($bool) {
                    //dd($filename2);
                    $path = $disk->downloadUrl('upload/image' . $filename2);
                    //return "上传成功,图片UR:" . $path;
                }else{
                    return "上传失败2";
                }
            } else {
                return "没有文件1";

            }
//            if ($request->file('picname') && $request->file('picname')->isValid()) {
//                //获取上传文件信息
//                $file = $request->file('picname');
//                $ext = $file->extension(); //获取文件的扩展名
//                //随机一个新的文件名
//                $filename = time() . rand(1000, 9999) . "." . $ext;
//                //移动上传文件
//                $file->move("./upload/merchant/lis/", $filename);
//            }
//
//            if ($request->file('logoname') && $request->file('logoname')->isValid()) {
//                //获取上传文件信息
//                $file = $request->file('logoname');
//                $ext = $file->extension(); //获取文件的扩展名
//                //随机一个新的文件名
//                $filename2 = time() . rand(1000, 9999) . "." . $ext;
//                //移动上传文件
//                $file->move("./upload/merchant/lis/", $filename2);
//
//            }

            //商家注册表
            $input = $request->only(['mername', 'password', 'city', 'address', 'longitude_latitude', 'shoptitle', 'phone', 'identity', 'username', 'typeid']);
            //dd($input);
            $password = HASH::make($input['password']);
            $input['password'] = $password;
            $input['first_ip'] = $request->getClientIp();
            $input['register_time'] = date("Y-m-d H:i:s", time());
            $input['logoname'] = $filename2;
            $input['picname'] = $filename;
            $lati_long = explode(',', $request->input('longitude_latitude'));
            $input['position'] = $geohash->encode($lati_long[1], $lati_long[0]);
            $res1 = \DB::table('mer_register')->InsertGetId($input);
            //dd($input);
            //dd($res1);

            //商家登录表
            $info['shopid'] = $res1;
            $info['phone'] = $input['phone'];
            $info['password'] = $input['password'];
            $info['shopname'] = $input['shoptitle'];
            $res2 = \DB::table('mer_login')->InsertGetId($info);
            //dd($info);
            //dd($res2);


            //商家表
            $data['shopid'] = $info['shopid'];
            $data['shopname'] = $info['shopname'];
            $data['logo'] = $input['logoname'];
            $data['phone'] = $input['phone'];
            $data['typeid'] = $input['typeid'];
            //dd($input['typeid']);
            $t = \DB::table('mer_sid')->where('id',$input['typeid'])->first();
            //dd($t->mid);
            $f = \DB::table('mer_mid')->where('id','=',$t->mid)->first();
            //dd($f);
            $data['f_typeid'] = $f->id;
            //dd($data['f_typeid']);
            $data['position'] = $input['position'];
            $data['address'] = $input['address'];
            $data['lati_long'] = $input['longitude_latitude'];
            $res3 = \DB::table('merchant')->InsertGetId($data);

            //dd($data);
            //dd($res3);

            $res = $res1 && $res2 && $res3;
            if ($res) {
                \DB::commit();

                $res0 = \Redis::sadd(SETS_MERCHAN_MERNAME, $input['mername']);
                $res1 = \Redis::sadd(SETS_MERCHAN_PHONE, $input['phone']);
                $res2 = \Redis::sadd(SETS_MERCHAN_SHOPTITLE, $input['shoptitle']);
                $res3 = \Redis::sadd(SETS_MERCHAN_IDENTITY, $input['identity']);
                if($res0 && $res1 && $res2 && $res3){
                    //file_put_contents('//txt.txt','ok');
                }
                $t2 = microtime();
            }
            
      /*  } catch (\PDOException $e) {
            \DB::rollback();
            $list = "有点问题，再来注册吧(其实是事务回滚)";
            return view('errors.503', compact('list'));
        };
        */
        $list = "恭喜您！旺铺正在审核中，请等待!";
        return view('errors.503', compact('list'));
       //return ($t2-$t1);
    }


// return view('merchant.login',['merchant_register',$merchant_register]);

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



    public function test_redis()
    {
        //数据库商家用户名存入REDIS
        $mername =  Mer_register::all('mername')->toArray();

        foreach($mername as $k => $v){
            $mername[$k] = $v['mername'];
        }
        //dd($mername);
        $res = \Redis::sadd(SETS_MERCHAN_MERNAME, $mername);
        //dd($res);
//        if($res== null){
//            $list = "用户名写入REDIS失败";
//            return view('errors.503',compact('list'));
//        }

        //数据库商家店铺名存入REDIS
        $shoptitle = Mer_register::all('shoptitle')->toArray();
        foreach($shoptitle as $k=>$v){
            $shoptitle[$k] = $v['shoptitle'];
        }
        $res = \Redis::sadd(SETS_MERCHAN_SHOPTITLE,$shoptitle);
         /*if(!$res){
             $list = "店铺名写入REDIS失败";
             return view('errors.503',compact('list'));
         }
        */
        //数据库商家手机号存入REDIS
        $phone = Mer_register::all('phone')->toArray();
        foreach($phone as $k=>$v){
            $phone[$k] = $v['phone'];
        }
        $res = \Redis::sadd(SETS_MERCHAN_PHONE,$phone);
      /*  if(!$res){
            $list = "商家手机号写入REDIS失败";
            return view('errors.503',compact('list'));
        }
    */
        //数据库商家身份证号存入REDIS
        $identity = Mer_register::all('identity')->toArray();
        foreach($identity as $k=>$v){
            $identity[$k] = $v['identity'];
        }
        $res = \Redis::sadd(SETS_MERCHAN_IDENTITY,$identity);
      /*  if(!$res){
            $list = "商家身份证号写入REDIS失败";
            return view('errors.503',compact('list'));
        }

        //商家总分类存入REDIS
        $mids = Mer_mid::all('id','title')->toArray();
        dd($mids);
            */
        /*
         dd($mername);
        $res = \Redis::sadd("VER", $mername);
        $res = \Redis::sadd("VER", "tina9999");
        dd($res);
        */

    }

}
