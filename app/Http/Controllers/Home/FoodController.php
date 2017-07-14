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
	public function index(Request $request,$id)
	{

		$ob = Merchant::where("shopid",$id)->first();
        //添加购物车到session
        //dd($shopcart);
        $shopcart = $request->session()->get("shopcart");
        if(!$request->session()->get("shopcart") || !array_key_exists($id,$shopcart)){
            $shopcart = [
                $id => [
                    'shopcart' => [],
                    'givemoney' => $ob->givemoney,
                    'total' => 0,
                    'money' => $ob->money,
                    'num' => 0
                ]
            ];
            $request->session()->put("shopcart", $shopcart);
        }

		$food_type = Food_type::where("shopid",$id)->get();
		foreach($food_type as &$v){
			$v->food = Food_list::where('typeid',$v->id)->get();
		}
		$shopcart = $request->session()->get("shopcart");
        //dd($shopcart);
        //unset($shopcart[1]['shopcart'][1]);
		return view('home.food.foodlist', ['type_list'=>$food_type,'ob'=>$ob, 'shopcart'=>$shopcart[$id]]);
	}

	
}
