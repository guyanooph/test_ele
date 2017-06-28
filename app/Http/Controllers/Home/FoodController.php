<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food_list;
use App\Models\Shop_list;

class FoodController extends Controller
{
    //
	public function list()
	{
		$list = Food_list::where('shopid',$_GET[id]);
		return view('home.food.index', ['list'=>$list]);
	}

}
