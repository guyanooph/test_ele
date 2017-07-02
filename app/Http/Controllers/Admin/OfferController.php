<?php
//建议管理器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class OfferController extends Controller
{
    //判断目前使用的环境
    public function index()
    {
        return view("admin.offer.index");
    	
    }

   



}
