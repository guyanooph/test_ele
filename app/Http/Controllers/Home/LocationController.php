<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\Dysmsapi\Request\V20170525\QuerySendDetailsRequest;
use App\Org\Dysmsapi\Request\V20170525\SendSmsRequest;
use App\Org\AliyunPhpSdkCore\Profile\DefaultProfile;
use App\Org\AliyunPhpSdkCore\Auth\Credential;
use App\Org\AliyunPhpSdkCore\DefaultAcsClient;


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
        
    }
}
