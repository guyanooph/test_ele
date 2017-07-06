<?php
//数据统计管理
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class ShopController extends Controller
{
    
    public function index()
    {
        return view("admin.stati.index");
    	
    }

   



}
