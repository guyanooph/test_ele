<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Merchant;
use App\Models\Food_list;
use App\Models\Orders;
use App\Models\Order_details;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(Request $request, $shopid)
    {
        $location = $request->session()->get("location");
        $ob = Merchant::where("shopid",$shopid)->first();
        $addressList = Address::where("userid",$request->session()->get("user")->id)->get();
        $shopcart = $request->session()->get("shopcart")[$shopid];
        $user = $request->session()->get("user");
        return view("home.personal.orderCheckout", compact('addressList','shopcart','location','ob','user'));
    }

    public function addOrder(Request $request, $shopid)
    {
        //dd($request->input());
        $ob = \DB::table("merchant")->where("shopid", $shopid)->first();
        $shopcart = $request->session()->get("shopcart")[$shopid];

        $toOrder = $request->only([
                                   "addressid",
                                   "service_time",
                                   "pay",
                                   "remark",
                                  ]);

        $toOrder['userid'] = $request->session()->get('user')->id;
        $toOrder['shopid'] = $shopid;
        $toOrder['shop_name'] = $ob->shopname;
        $toOrder['shop_phone'] = $ob->phone;
        $toOrder['goods_num'] = $shopcart['num'];
        $toOrder['create_time'] = date("Y-m-d H:i:s", time()+8*3600);
        $toOrder['amount'] = $shopcart['total'];
        $toOrder['status'] = 0; //未支付
        $twoFood = array_slice($shopcart['shopcart'],0,2);
        $toOrder['description'] = $twoFood[0]['food']->title." ".$twoFood[0]['num']."份"." ".(isset($twoFood[1])?$twoFood[1]['food']->title." ".$twoFood[1]['num']."份":null); //所定菜品简介
        $toOrder['order_description'] = "逾期未支付订单将自动取消";
        $toOrder['over_time'] = null;
        $toOrder['delivery_fee'] = $ob->money;
        $toOrder['lunch_box_fee'] = $ob->lunch_box_fee;
        $toOrder['packetid'] = null;
        $toOrder['distribution'] = 1;
        $toOrder['invoice_info'] = "无";

        DB::beginTransaction();
        $toOrderResult = Orders::insertGetId($toOrder);
        $toOrderDetailsResult = true;        
        foreach($shopcart['shopcart'] as $food){
            $toOrderDetails = [];
            $toOrderDetails['orderid'] = $toOrderResult;
            $toOrderDetails['shopid'] = $shopid;
            $toOrderDetails['order_time'] = $toOrder['create_time'];
            $toOrderDetails['foodid'] = $food['food']->id;
            $toOrderDetails['price'] = $food['food']->price;
            $toOrderDetails['num'] = $food['num'];
            $toOrderDetailsResult =  $toOrderDetailsResult && Order_details::insert($toOrderDetails);
        }
        
        if($toOrderResult && $toOrderDetailsResult){
            DB::commit();
            return redirect("/pay");
        }else{
            DB::rollback();
            return redirect("/".$shopid."/ordercheckout");
        }

    }

    public function orderdetail(Request $request,$id)
    {
        //
        //var_dump($id);
		$user = $request->session()->get("user");
		$location = $request->session()->get('location');
        $order=Order_details::where('orderid',$id)->get()->toArray();
        //var_dump($order);
        //$shop=Merchant::where('shopid',$order['shopid'])->first();
        //dd($order);
        foreach($order as $k=>$or){
            $order[$k]['food']=Food_list::find($or['foodid'])->toArray();
        }
        //dd($order);
        return view('home.order.orderdetail',['user'=>$user,'order'=>$order,'location'=>$location]);
    }
}
