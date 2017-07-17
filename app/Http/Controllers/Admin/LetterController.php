<?php
//投诉管理控制器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LetterController extends Controller
{
    
    public function index()
    {
        return view("admin.letter.index");
    	
    }

   



}
