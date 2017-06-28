<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin_root;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class RootController extends Controller
{
    //判断目前使用的环境
    public function index()
    {

    	//超级管理员的ID是1


    	$db=Admin_root::find(1);
        
         return view("admin.root.index",['v' => $db]);
       
    }

}
