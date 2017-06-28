<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class IndexController extends Controller
{
    //判断目前使用的环境
    public function index()
    {
        return view("merchant.index");
    	
    }

   



}
