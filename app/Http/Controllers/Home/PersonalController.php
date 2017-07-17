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
		$staus=[];
		//$list = Personal::find();		
        $user = $request->session()->get("user");
		//dd($user);
	    $order = orders::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);
		//$login_user = login_user::where('username',$login->id)->get();
		$info = personal::first();
		//$status=['未付款','已付款','已取消'];
		//var_dump($status);die;
		//var_dump($info);
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info,'status'=>$status]);
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
		$address=$userInfo->address;
		return view('home.personal.address',['address'=>$address]);
	}
   
	 public function order(Request $request)
	{
		//$userid = \Session::get("user")->id();
        $user = $request->session()->get('user');
		$order=Orders::where('userid',$user->id)->get();
		//$s[$order->status]=['未付款','已付款','已取消'];
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
	public function collect(Request $request)  
	{
		$user = $request->session()->get('user');
		$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.collect',['collect'=>$collect]);
	} 
	
	
	public function changeavatar(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.changeavatar');
	}

	public function changemobile(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.changemobile');
	}

	public function changeemail(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.changeemail');
	}

	public function modifypay(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.modifypay');
	}

	
	/*
	
    public function test()
    {
        return view("home.personal.personal_8");
    } */
	
	//账户余额
	public function balance()
	{
		$balance=Orders::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
	
}
