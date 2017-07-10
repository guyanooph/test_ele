<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food_list;
use App\Models\Merchant;
use App\Models\Food_type;

class FoodController extends Controller
{
    //
	public function index($id)
	{
		//$db = \DB::table	
		//dd($request);
		//$id = $request->input('id');
		//dd($id);
		//$list = Food_list::where("shopid",$id)->get();
		$food_type = Food_type::where("shopid",$id)->get();
		//dd(Food_list::where('typeid',3)->get());
		foreach($food_type as &$v){
			$v->food = Food_list::where('typeid',$v->id)->get();
		}
		
		//dd($list);
		$ob = Merchant::where("shopid",$id)->first();
		

		//$ob = \DB::table('merchant')->where("shopid",$_GET['id'])->first();
		
		return view('home.food.foodlist', ['type_list'=>$food_type,'ob'=>$ob]);
	}

	
}
