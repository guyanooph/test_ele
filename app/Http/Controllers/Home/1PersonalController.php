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
    public function index(Request $request)
	{
		
		//$list = Personal::find();		
        $user = $request->session()->get("user");
		//dd($user);
	    $order = order::where('userid',$user->id)->orderBy('create_time','rsort')->get();
		//dd($order);

		//$login_user = login_user::where('username',$login->id)->get();
		
		
		$info = personal::first();
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order ,'info'=>$info]);
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
		$order=Order::where('userid',$userid->id)->get();
		return view('home.personal.order',['order'=>$order]);
		//return view('home.personal.order');
	}

     //待评价订单
	public function orderUnrated()
	{
		$orderUnrated=Order::where('status',1)->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}

     //退单记录
	public function orderRefund()
	{
		$orderRefund=Order::where('status',2);
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	//我的红包
	public function red_packet()
	{
		$packet = packet::all();
		return view('home.personal.red_packet',['packet'=>$packet]);
	}

	/*public function balance()
	{
		$balance=Order::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
*/
    //我的 评分/积分
	public function score()
	{
		$score=score::where('userid',1);
		return view('home.personal.score',['score'=>$score]);
	}

	//收集
	public function collect()  
	{
		$collect=Collect::all();
		return view('home.personal.collect',['collect'=>$collect]);
	}

	public function userInfo()
	{

		
		//$userInfo=User_info::where('userid',1);
		/*$id=session['user']['userid'];
		$userInfo=User_info::find($id);
		if(Input::has('name')){
			$userInfo->username=input::("name");
		}
		$usrInfo->save();*/

		$userInfo=User_info::find(1);
		return view('home.personal.userinfo',['userInfo'=>$userInfo]);
	}

	//地址
	public function address()
	{
		$address=Address::all();
		return view('home.personal.address',['address'=>$address]);
	}
    
    public function test()
    {
        return view("home.personal.personal_8");
    }
}
