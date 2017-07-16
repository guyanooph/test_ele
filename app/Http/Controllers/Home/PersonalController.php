<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Orders;
use App\Models\Order_details;
use App\Models\User_info;
use App\Models\Collect;
use App\Models\Packet;
use App\Models\Score;
use App\Models\Address;
use App\Models\Login_user;
use Session;

class PersonalController extends Controller
{
    public function index(Request $request)
	{
			
		//$list = Personal::find();		
        $user = $request->session()->get("user");
		//dd($user);
	    $order = orders::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);
		//$login_user = login_user::where('username',$login->id)->get();
		$info = personal::first();
		//var_dump($info);
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info]);
	}

	public function userInfo(Request $request)
	{
		$user = $request->session()->get('user');
		$userInfo = User_info::where("userid",$user->id)->first();
		return view('home.personal.userinfo',['userInfo'=>$userInfo]);
	}
	
	//地址
	public function address(Request $request)
	{
		$user=$request->session()->get('user');
		$userInfo=User_info::where("userid",$user->id)->first();
		$address=$userInfo->address;dd($user);
		return view('home.personal.address',['address'=>$address]);
	}
    /* public function index($id)
	{
		$userid = user_info::where('userid',$id)->first();
		
		$order = order::where('userid',$id)->get();
		
		return view('home.personal.personal' ,['userid'=>$userid , 'order'=>$order]);
	} */
	
	 public function order(Request $request)
	{
		//$userid = \Session::get("user")->id();
        $userid = $request->session()->get('user');
		$order=Orders::where('userid',$userid->id)->get();
		return view('home.personal.order',['order'=>$order]);
		//return view('home.personal.order');
	}

     //待评价订单
	public function orderUnrated()
	{
		$orderUnrated=Orders::where('status',1)->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}

     //退单记录
	public function orderRefund()
	{
		$orderRefund=Orders::where('status',2);
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	//我的红包
	public function red_packet()
	{
		$packet = packet::all();
		return view('home.personal.red_packet',['packet'=>$packet]);
	}
	
    //我的 评分/积分
	public function score()
	{
		$score=score::where('userid',1);
		return view('home.personal.score',['score'=>$score]);
	}
	
	//安全中心
	public function security()
	{
		
		return view('home.personal.security');
	}
	
	
	// 修改密码
	public function changepassword()
	{
		
		return view('home.personal.changepassword');
	}
	
	
	// 个人收藏
	public function collect()  
	{
		$collect=Collect::all();
		return view('home.personal.collect',['collect'=>$collect]);
	} 
	
	
	//账户余额
	public function balance()
	{
		$balance=Orders::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
	
	/*
	
    public function test()
    {
        return view("home.personal.personal_8");
    } */
	
	
	
	//服务中心
	public function fuwu()
	{
		return view('home.personal.fuwu');
	}
	
	//规则中心
	public function guize()
	{
		return view('home.personal.guize');
	}
	
	//常见问题
	public function wenti()
	{
		return view('home.personal.wenti');
	}
	
	//饿了么介绍
	public function jieshao()
	{
		return view('home.personal.jieshao');
	}
	
	//联系我们
	public function lianxi()
	{
		return view('home.personal.lianxi');
	}
	
	
	
}
