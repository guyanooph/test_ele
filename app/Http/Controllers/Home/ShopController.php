<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_list;
use App\Org\Geohash;
use Session;

class ShopController extends Controller
{
	public function index(Request $request)
	{
        //$request->session()->forget("location");
        //$request->session()->forget("position");
        //当用户直接访问/或是/shoplist时(即使用get，且没带参数)，先判断是否存在session，及session中是否存在location
        //如果存在，就用这个location来加载附近商家
        //当用户由/home(定位页面)完成定位，跳转到/时，
        //获取$request中的location信息，以被后面加载附近商家使用
        //在session中写入location信息
        if($request->session()->has("location")){
            $location = $request->session()->get("location")['position'];

            //用私有方法加载附近商家
            $list = $this->loadShops($location);
            return view('home.shop.shoplist', ['list'=>$list, 'user'=>\Session::get('user')]);
        }elseif($request->input("location")){
            $location = $request->input("location");
            $request->session()->put("location", ['position' => $request->input("location"), 'address' => $request->input("address")]);

            //用私有方法加载附近商家
            $list = $this->loadShops($location);
       	    return view('home.shop.shoplist',['list'=>$list, 'user'=>\Session::get('user')]);
            //$this->loadShops($location);
        }else{
            return redirect("/home");
        }
	}
    
    private function loadShops($location){
        //加载附近商家
        $geohash = new Geohash();
        $geo = $geohash->encode(explode(",",$location)[1],explode(",",$location)[0]);
		$list = Shop_list::where('position', 'like', substr($geo,0,5).'%')->limit(10)->get();
		//$list = Shop_list::where('position', 'like', substr($geo,0,5).'%')->paginate(15);
       	return $list;
    }
}
