<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    //城市级联DEMO
    public function index()
    {
        //dd('ok');
        return view("admin.user.district");
    }

    //根据参数upid获取对应的城市类别信息
    public function show($upid=0)
    {
        //dd("ok");
        $list = \DB::table("district")->where("upid",$upid)->get();
        return response()->json($list);
    }
}
