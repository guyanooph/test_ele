<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\Dysmsapi\Request\V20170525\QuerySendDetailsRequest;
use App\Org\Dysmsapi\Request\V20170525\SendSmsRequest;
use App\Org\aliyun_php_sdk_core\Profile\DefaultProfile;
use App\Org\aliyun_php_sdk_core\DefaultAcsClient;


class LocationController extends Controller
{
    //
    public function location()
    {
        return view("home.location.location",[]);
    }
    
    public function testshop(Request $request)
    {
        $input = $request->only('address', 'location');
        dd($input);
    }    
    
    public function sendsms()
    {
        $accessKeyId = "LTAIYJszJgNuvow8";//参考本文档步骤2
        $accessKeySecret = "iasEIM0aCcGfFqAcErCtEdy0akJg7C";//参考本文档步骤2
        //短信API产品名
        $product = "Dysmsapi";
        //短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region
        $region = "cn-hangzhou";
        //初始化访问的acsCleint
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient= new DefaultAcsClient($profile);
        $request = new SendSmsRequest;
        //必填-短信接收号码。支持以逗号分隔的形式进行批量调用，批量上限为20个手机号码,批量调用相对于单条调用及时性稍有延迟,验证码类型的短信推荐使用单条调用的方式
        $request->setPhoneNumbers("13773136524");
        //必填-短信签名
        $request->setSignName("胡必腾");
        //必填-短信模板Code
        $request->setTemplateCode("SMS_75740102");
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        $request->setTemplateParam("{\"name\":\"12345\"}");
        //选填-发送短信流水号
        $request->setOutId("1234");
        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
    }
}
