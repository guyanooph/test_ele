<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Order;
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
<<<<<<< HEAD
    public $id=\Session::get('user')->userid;
    function __construct()
    {
    	$this->id=$id;
    }
    public function index()
    {
		$list = Personal::where('userid',$this->id)->first();
		$order=order::where(['userid','=',$this->id],['status','=','0'])->orderBy('addtime','rsort')->get();
		return view('home.personal.personal' ,['list'=>$list,'order'=>$order]);
=======
    public function index(Request $request)
	{
		
		//$list = Personal::find();		
        $user = $request->session()->get("user");
		//dd($user);
	    $order = order::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);

		$login_user = login_user::where('username',$login->id)->get();
		
		
		$info = personal::first();
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info]);
>>>>>>> caa86f485bdf017c11d2b4fce2142c8fcfcd6d85
	}

 
    /* public function index($id)
	{
		$userid = user_info::where('userid',$id)->first();
		
		$order = order::where('userid',$id)->get();
		
		return view('home.personal.personal' ,['userid'=>$userid , 'order'=>$order]);
	} */
	
	public function order()
	{
<<<<<<< HEAD
		$order=Order::where(['userid','=',$this->id],['status','=','0'])->first();
=======
		$userid = \Session::get("user")->id();

		$order=Order::where('userid',$userid)->get();
>>>>>>> caa86f485bdf017c11d2b4fce2142c8fcfcd6d85
		return view('home.personal.order',['order'=>$order]);
	}

     //未付款
	public function orderUnrated()
	{
		$orderUnrated=Order::where(['userid','=',$this->id],['status','=','1'])->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}

     //订单退款
	public function orderRefund()
	{
		$orderRefund=Order::where(['userid','=',$this->id],['status','=','2'])->get();
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	//我的红包
	public function red_packet()
	{
		$packet=packet::where('userid',$this->id)->get();
		return view('home.personal.packet',['packet'=>$packet]);
	}

	/*public function balance()
	{
		$balance=Order::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
*/
    //评分/积分
	public function score()
	{
		$score=score::where('userid',$this->id)->get();
		return view('home.personal.score',['score'=>$score]);
	}

	//收集
	public function collect()  
	{
		$collect=Collect::where('userid',$this->id)->get();
		return view('home.personal.collect',['collect'=>$collect]);
	}

	public function userInfo()
	{
		$userInfo=User_info::find('userid',$this->id)->first();
		return view('home.personal.userinfo',['userInfo'=>$userInfo]);
	}

	//地址
	public function address()
	{
		$address=Address::where('userid',$this->id)->all();
		return view('home.personal.address',['address'=>$address]);
	}
    
    public function test()
    {
        return view("home.personal.personal_8");
    }
}
