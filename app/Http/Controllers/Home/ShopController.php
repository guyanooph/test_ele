<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_list;
use App\Models\Mer_mid;
use App\Models\Mer_sid;
use App\Models\rate;
use App\Org\Geohash;
use Session;

class ShopController extends Controller
{
	public function index(Request $request)
	{

        $merType = Mer_mid::all()->toArray();       
        foreach($merType as $k => $v){
            $merType[$k]['sid'] = Mer_sid::where("mid",$v['id'])->get()->toArray();
        }
        $merTypeJson = json_encode($merType);

        $user = \Session::get('user');
        $type = $merType;
        $type_json = $merTypeJson;
        $location = $request->session()->get("location");
        $default = $request->session()->get("default_cart");
        $shopcart = $request->session()->get("shopcart");
        //当用户直接访问/或是/shoplist时(即使用get，且没带参数)，先判断是否存在session，及session中是否存在location
        //如果存在，就用这个location来加载附近商家
        //当用户由/home(定位页面)完成定位，跳转到/时，
        //获取$request中的location信息，以被后面加载附近商家使用
        //在session中写入location信息
        if($request->session()->has("location")){
            $position = $request->session()->get("location")['position'];

            //用私有方法加载附近商家
            $list = $this->loadShops($request, $position);
            return view('home.shop.shoplist', compact('list','user','type','type_json','location','shopcart','default'));
        }elseif($request->input("location")){
            $position = $request->input("location");
            $request->session()->put("location", ['position' => $request->input("position"),'city' =>$request->input("city"),'address' => $request->input("address")]);

            //用私有方法加载附近商家
            $list = $this->loadShops($request, $position);
       	    return view('home.shop.shoplist',compact('list','user','type','type_json','location'));
        }else{
            return redirect("/home");
        }
	}
    
    public function getMerType()
    {
        $merType = Mer_mid::all()->toArray();       
        foreach($merType as $k => $v){
            $merType[$k]['sid'] = Mer_sid::where("mid",$v['id'])->get()->toArray();
        }
        $merTypeJson = json_encode($merType);
        return $merTypeJson;
    }


    public function loadShops(Request $request, $location=null, $type=null)
    {
        if($location === null){
            $location = $request->session()->get("location")["position"];
        }
        //加载附近商家
        $geohash = new Geohash();
        $geo = $geohash->encode(explode(",",$location)[1],explode(",",$location)[0]);
        //dd($geo);

        $where = ["state"=>2];

        if($request->input("typeid")){
            $typeid = $request->input("typeid");
            if($typeid[0]=="f"){
                $where["f_typeid"] = substr($typeid,1);
            }else{
                $where["typeid"] = $typeid;
            }
        }

        //dd(QINIU_PREFIX);
        if($request->method =="post"){
       	    return json_encode(Shop_list::where('position', 'like', substr($geo,0,4).'%')->where($where)->limit(10)->get()->toArray());
        }else{
            return Shop_list::where('position', 'like', substr($geo,0,4).'%')->where($where)->limit(10)->get();
        }
    }

    public function rate()
    {
        return view("home.shop.rate");
    }
}
