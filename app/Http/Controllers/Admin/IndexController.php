<?php
//后台首页控制器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class IndexController extends Controller
{
    
    public function index()
    {
        $adminuser=\Session::get('adminuser');

        return view("admin.index",['adminuser'=>$adminuser]);
    	
    }

   



}
