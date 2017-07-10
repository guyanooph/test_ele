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

class PersonalController extends Controller
{
    public function index(Request $request)
	{
		//$id=session['userid'];
		//$list = Personal::find();
        $user = $request->session()->get("user");
		$order = order::where('userid',$user->userid)->orderBy('addtime','rsort');
		return view('home.personal.personal' ,['user'=>$user,'order'=>$order]);
        	
	}

	public function order()
	{
		$order=Order::where('userid',1)->get();
		return view('home.personal.order',['order'=>$order]);
	}


	public function orderUnrated()
	{
		$orderUnrated=Order::where('status',1);
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}


	public function orderRefund()
	{
		$orderRefund=Order::where('status',2);
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

	public function red_packet()
	{
		$packet=packet::all();
		return view('home.personal.packet',['packet'=>$packet]);
	}

	/*public function balance()
	{
		$balance=Order::where('status',2);
		return view('home.personal.balance',['balance'=>$balance]);
	}
*/
	public function score()
	{
		$score=score::where('userid',1);
		return view('home.personal.score',['score'=>$score]);
	}

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

	public function address()
	{
		$address=Address::all();
		return view('home.personal.address',['address'=>$address]);
	}
}
