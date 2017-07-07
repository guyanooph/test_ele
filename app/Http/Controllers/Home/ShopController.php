<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_list;
use App\Org\Geohash;

class ShopController extends Controller
{
    //
	public function index(Request $request)
	{
        //dd($request);
        //$location = $request->input('location');
        //dd(explode(",", $location));
        //$geohash = new Geohash();
        //$geo = $geohash->encode(explode(",",$location)[1],explode(",",$location)[0]);
        //dd($geo);
		//$list = Shop_list::where('position', 'like', substr($geo,0,7).'%')->get();
        //echo $location."<br/>";
        //foreach($list as $v){
        //    echo $v->longitude_latitude."<br/>";
        //}
		//return view('home.shop.shoplist',['list'=>$list]);
		//return view('home.shop.shoplist');
		//$list = Shop_list::where('id',1)->first();
		$list = Shop_list::all();
		return view('home.shop.shoplist',['list'=>$list]);
	}
	
	
}
