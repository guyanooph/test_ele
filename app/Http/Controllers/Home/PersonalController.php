<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index()
	{
		//$list = Shop_list::where('id',1)->first();
		$personal = Personal::find(1);
		return view('home.personal.index',['personal'=>$personal]);
		
	}
}
