<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LetterController extends Controller
{
    //判断目前使用的环境
    public function index()
    {
        return view("admin.letter.index");
    	
    }

   



}
