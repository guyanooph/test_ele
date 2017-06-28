<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_list;

class ShopController extends Controller
{
    //
	public function list()
	{
		//$list = Shop_list::where('id',1)->first();
		$list = Shop_list::all();
		return view('home.shop.list',['list'=>$list]);
		
	}
}
