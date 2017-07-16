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
	    $order = Orders::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);

		//$login_user = login_user::where('username',$login->id)->get();
		
		
		$info = personal::first();
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info]);

	}

	
	public function order(Request $request)
	{
		//var_dump($request->session());
		$id=$request->session()->get('user')->id;
		$order=Orders::where(['userid'=>$id,'status'=>1])->get();
		//var_dump($order);
		return view('home.personal.order',['order'=>$order]);
	}

     //未付款
	public function orderUnrated(Request $request)
	{
		$id=$request->session()->get('user')->id;
		$orderUnrated=Orders::where(['userid','=',$id],['status','=','1'])->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}

     //订单退款
	public function orderRefund(Request $request)
	{
		$id=$request->session()->get('user')->id;
		$orderRefund=Orders::where(['userid','=',$id],['status','=','2'])->get();
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	//我的红包
	public function red_packet(Request $request)
	{
		$id=$request->session()->get('user')->id;
		$packet=packet::where('userid',$id)->get();
		return view('home.personal.packet',['packet'=>$packet]);
	}

	/*public function balance()
	{
		$balance=Order::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
*/
    //评分/积分
	public function score(Request $request)
	{
		$id=$request->session()->get('user')->id;
		$score=score::where('userid',$id)->get();
		return view('home.personal.score',['score'=>$score]);
	}

	//收集
	public function collect(Request $request)  
	{
		$id=$request->session()->get('user')->id;
		$collect=Collect::where('userid',$id)->get();
		return view('home.personal.collect',['collect'=>$collect]);
	}

	public function userInfo(Request $request)
	{
		$id=$request->session()->get('user')->id;
		//var_dump($id);die;
		$userInfo=User_info::where('userid',$id)->first();
		return view('home.personal.userinfo',['userInfo'=>$userInfo]);
	}

	//地址
	public function address(Request $request)
	{
		$id=$request->session()->get('user')->id;
		$address=Address::where('userid',$id)->get();
		return view('home.personal.address',['address'=>$address]);
	}
    
    public function test()
    {
        return view("home.personal.personal_8");
    }
}
