<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food_list;
use App\Models\Merchant;

class FoodController extends Controller
{
    //
	public function list()
	{
		//$db = \DB::table	
		
		$list = Food_list::all();
		$ob = Merchant::find(1);

		//$ob = \DB::table('merchant')->where("shopid",$_GET['id'])->first();
		
		return view('home.food.foodlist', ['list'=>$list,'ob'=>$ob]);
	}

	
}
