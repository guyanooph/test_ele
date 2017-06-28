<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food_list;

class FoodController extends Controller
{
    //
	public function list()
	{
		$list = Food_list::find(1);
		return view('home.index', ['list'=>$list]);
		
	}

}