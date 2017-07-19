<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Merchant;
use App\Models\Orders;
use App\Models\Order_details;
use App\Models\User_info;
use App\Models\Food_rate;
use App\Models\Rate;
use App\Models\Collect;
use App\Models\Packet;
use App\Models\Score;
use App\Models\Address;
use App\Models\Login_user;
use App\Models\Food_list;
use App\Org\Geohash;
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
	
	public function delAddress(Request $request, $id)
    {
		$res = Address::where(["id"=>$id,"userid"=>$request->session()->get("user")->id])->forceDelete();
	}
	
	public function addAddress(Request $request)
    {

        $geohash = new Geohash;
        $location = $request->input('lati_long'); 
        $geo = $geohash->encode(explode(",",$location)[1],explode(",",$location)[0]);
        $input = $request->only("name","sex","address","address_details","phone","lati_long");
        $input['userid'] = $request->session()->get("user")->id;
        $input['created_at'] = date("Y-m-d H:i:s", time());
        $input['position'] = $geo;
        $res = Address::insert($input);
        return json_encode([$res]);
	}
	
	public function editAddress(Request $request, $id)
    {
		
		$address = Address::findOrFail($id)->toArray();
		if($address['userid'] != $request->session()->get('user')->id){
			return "false";
		}
		
		return json_encode($address);
	}

    public function updateAddress(Request $request, $id)
    {
        //name:name,sex:sex,address:address,address_details:address_details,phone:phone,lati_long:lati_long
        $update = $request->only("name","sex","address","address_details","phone","lati_long");
        //$address = Adress::
        $res = Address::where(['id'=> $id,'userid'=>$request->session()->get("user")->id])->update($update);
        return $res;
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

    //待评价订单列表
	public function orderUnrated(Request $request)
	{
		$location = $request->session()->get('location');
		$user = $request->session()->get("user");
		$orderUnrated=Orders::where('status',3)->get();
        foreach( $orderUnrated as $k=>$v ){
            $orderUnrated[$k]->logo = Merchant::where("shopid", $v->shopid)->first()->logo; 
        }
		return view('home.personal.orderUnrate',['location' =>$location, 'user'=>$user, 'orderUnrated' => $orderUnrated]);
	}

    //订单评价表单
	public function rateOrderForm(Request $request, $orderid)
	{
        //$order = Orders::find($orderid)->toArray();
		$user = $request->session()->get("user");
        $order = Orders::where(['id' => $orderid, 'userid' => $user->id, 'status' => 3])->first()->toArray();
        $ob = Merchant::where("shopid",$order['shopid'])->first();
		$location = $request->session()->get('location');
        $order_details = Order_details::where('orderid', $order['id'])->get()->toArray();
        foreach($order_details as $k => $vo){
            $order_details[$k]['food'] = Food_list::find($vo['foodid'])->toArray();
        }
		return view('home.personal.orderrateform',['location' =>$location, 'user'=>$user, 'order' => $order, 'ob' => $ob, 'order_details' => $order_details]);
	}


    //评价订单
	public function addRateToOrder(Request $request, $orderid)
	{
        //dd($request->input());
		$user = $request->session()->get("user");
        $order = Orders::where(['id'=> $orderid,'status'=>3,'userid' => $user->id])->toArray();
		$location = $request->session()->get('location');

        $theTime = date("Y-m-d H:i:s", time());
        $shop_rate = $request->only('shopg_rate','content','service_time','shopid');
        $shop_rate['userid'] = $user->id;
        $shop_rate['service_time'] = substr($shop_rate['service_time'], 0, -6);
        $shop_rate['orderid'] = $orderid;
        $shop_rate['create_time'] = $theTime;
        //dd($shop_rate);
        \DB::beginTransaction();

        $res_1 = Rate::insertGetId($shop_rate);
        $res_2 = true;
        foreach($request->input()['food'] as $vo){
            if($vo['rate'] == 0){
                $vo['rate'] = 5;
            }
            $vo['userid'] =  $user->id;
            $vo['commentid'] = $res_1;
            $vo['shopid'] = $request->input('shopid');
            $res_2 = $res_2 && Food_rate::insert($vo);
        }
        
        //更新商家评论数
        $ob = Merchant::where('shopid',$request->input('shopid'))->first();
        $ob->rate_num = $ob->rate_num + 1;
        $res_3 = $ob->save();
       
        //更新积分
        $personal = Personal::where("userid",$user->id)->first();
        //dd($personal);
        $personal->score+= ($order['amount'] * 10);
        $res_4 = $personal->save();

        $order->status = 4;
        $res_5 = $order->save();
         
        if($res_1 && $res_2 && $res_3 && $res_4 && $res_5){
            \DB::commit();
            return "1";
        }else{
            \DB::rollBack();
            return "0";
        }
        
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
        $geohash = new Geohash();
		$location = $request->session()->get('location');
        $geo = $geohash->encode(explode(',',$location['position'])[1],explode(',',$location['position'])[0]);
		$user = $request->session()->get('user');
		$res = Collect::where('userid',$user->id)->get()->toArray();
        $collect = [[],[]];
        foreach($res as $v){
            $v['shop'] = Merchant::where("shopid",$v['shopid'])->first()->toArray();
            if(substr($v['shop']['position'], 0, 4) == substr($geo, 0, 4)){
                $collect[0][] = $v;
            }else{
                $collect[1][] = $v;
            }
        }

		return view('home.personal.collect',['collect'=>$collect,'location' => $location, 'user' => $user]);
	} 

    //添加到 个人收藏
	public function addcollect(Request $request)  
	{
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
        $input['shopid'] = $request->input("shopid");
        $input["create_time"] = date("Y-m-d H:i:s", time());
        $input['userid'] = $user->id;
        $res = Collect::insert($input);
        if($res){
            return json_encode(["res"=>$res, "info"=>"添加成功"]);
        }else{
            return json_encode(["res"=>$res, "info"=>"添加失败"]);
        }
	} 
	//取消 个人收藏
	public function removecollect(Request $request)  
	{
		$location = $request->session()->get('location');
		$user = $request->session()->get('user');
        $shopid = $request->input("shopid");
        $res = Collect::where(["userid"=>$user->id, "shopid"=>$shopid])->forceDelete();
        if($res){
            return json_encode(["res"=>$res, "info"=>"取消成功"]);
        }else{
            return json_encode(["res"=>$res, "info"=>"取消失败"]);
        }
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
