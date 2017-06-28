<?php

namespace App\Http\Controllers\Merchart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function index()
    {
        return view("merchart.index");
    }
}