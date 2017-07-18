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

		$location = $request->session()->get('location');
		//$list = Personal::find();		
        $user = $request->session()->get("user");
		//dd($user);
	    $order = orders::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);
		//$login_user = login_user::where('username',$login->id)->get();

		$info = personal::where('userid',$user->id)->first();
		//var_dump($info);
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info, 'location' => $location]);

	}

	public function userInfo(Request $request)
	{
		$user = $request->session()->get('user');
		$userInfo = User_info::where("userid",$user->id)->first();
		//dd($userInfo);
		$location = $request->session()->get('location');
		return view('home.personal.userinfo',['userInfo'=>$userInfo , 'location' => $location]);
	}
	
	//地址
	public function address(Request $request)
	{
		$user = $request->session()->get('user');
		$location = $request->session()->get('location');
		$userInfo=User_info::where("userid",$user->id)->first();

		$address = Address::where('userid', $user->id)->get();
		//dd($user);
		return view('home.personal.address',['address'=>$address,'user' => $user, 'location' => $location]);
	}
	
	public function delAddress(){
		
	}
	
	public function addAddress(){
		
	}
	
	public function editAddress(Request $request, $id){
		
		$address = Address::findOrFail($id)->toArray();
		if($address['userid'] != $request->session()->get('user')->id){
			return "false";
		}
		
		return json_encode($address);
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
        $user = $request->session()->get('user');
		$location = $request->session()->get('location');
		$order=Orders::where('userid',$user->id)->get();
		return view('home.personal.order',['order'=>$order, 'location'=>$location]);
	}

     //待评价订单
	public function orderUnrated(Request $request)
	{
		$location = $request->session()->get('location');
		$user = $request->session()->get("user");
		$orderUnrated=Orders::where('status',1)->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated ,'location' =>$location, 'user'=>$user]);
	}

     //退单记录
	public function orderRefund()
	{
		$orderRefund=Orders::where('status',2);
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	//我的红包
	public function red_packet(Request $request)
	{
		$packet = packet::all();
		$location = $request->session()->get('location');
		return view('home.personal.red_packet',['packet'=>$packet , 'location' => $location]);
	}
	
    //我的 评分/积分
	public function score(Request $request)
	{
		$score=score::where('userid',1);
		$location = $request->session()->get('location');
		return view('home.personal.score',['score'=>$score,'location' => $location]);
	}
	
	//安全中心
	public function security(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.security', ['location' => $location, 'user' => $user]);
	}
	
	
	// 修改密码
	public function changepassword(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.changepassword',['location' => $location, 'user' => $user]);
	}
	
	
	// 个人收藏
	public function collect(Request $request)  
	{
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
		$collect=Collect::where('userid',$user->id)->get();
		return view('home.personal.collect',['collect'=>$collect,'location' => $location]);
	} 
	
	
	//账户余额
	public function balance(Request $request)
	{
		$balance=Orders::where('status',2);
		$location = $request->session()->get('location');
		return view('home.personal.balance',['balance'=>$balance , 'location' => $location]);
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
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
		return view('home.personal.changemobile', ['location'=>$location, 'user'=>$user]);
	}

	public function changeemail(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
		return view('home.personal.changeemail', ['location'=>$location, 'user'=>$user]);
	}

	public function modifypay(Request $request)  
	{
		//$user = $request->session()->get('user');
		//$collect=Collect::where('userid',$user->id)->get();
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
		return view('home.personal.modifypay', ['location'=>$location, 'user'=>$user]);
	}

	
	/*
	
    public function test()
    {
        return view("home.personal.personal_8");
    } */
	
	
	
	
	
	//规则中心
	public function guize(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.guize' ,['location' => $location, 'user' => $user]);
	}
	
	//常见问题  服务
	public function wenti(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.wenti', ['location' => $location, 'user' => $user]);
	}
	
	//饿了么介绍
	public function jieshao(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.jieshao' , ['location' => $location, 'user' => $user]);
	}
	
	//联系我们
	public function lianxi(Request $request)
	{
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
		return view('home.personal.lianxi' , ['location' => $location, 'user' => $user]);
	}
	
	
	
}
