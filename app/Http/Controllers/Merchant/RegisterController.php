<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Mer_register;
use App\Org\Image;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //执行注册
    public function index()
    {
        //
        //$list = array('id'=>1,'content'=>'注册成功');
//        return view('merchant.register.index',compact('$list'));
        //return view('merchant.register.index',［'list'=>""］);
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
            $password = md5($input['password']);
            $password = md5(substr_replace($password, $input['phone'], 0, 4));
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
}
