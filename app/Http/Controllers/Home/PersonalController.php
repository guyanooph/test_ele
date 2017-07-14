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
	}

	public function order()
	{
		$order=Order::where(['userid','=',$this->id],['status','=','0'])->first();
		return view('home.personal.order',['order'=>$order]);
	}


	public function orderUnrated()
	{
		$orderUnrated=Order::where(['userid','=',$this->id],['status','=','1'])->get();
		return view('home.personal.orderUnrate',['orderUnrated'=>$orderUnrated]);
	}


	public function orderRefund()
	{
		$orderRefund=Order::where(['userid','=',$this->id],['status','=','2'])->get();
		return view('home.personal.orderRefund',['orderRefund'=>$orderRefund]);
	}

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
	public function score()
	{
		$score=score::where('userid',$this->id)->get();
		return view('home.personal.score',['score'=>$score]);
	}

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

	public function address()
	{
		$address=Address::where('userid',$this->id)->all();
		return view('home.personal.address',['address'=>$address]);
	}
}
