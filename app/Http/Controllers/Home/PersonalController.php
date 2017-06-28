<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function list()
	{
		//$list = Shop_list::where('id',1)->first();
		$list = Personal::find(1);
		return view('home.personal',['list'=>$list]);
		
	}
}
