<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use zgldh\QiniuStorage\QiniuStorage;

class LocationController extends Controller
{
    //
    public function location()
    {
        return view("home.location.location",[]);
    }
    
    public function testshop(Request $request)
    {
        $input = $request->only('address', 'location');
        dd($input);
    }    
    
    public function upload()
    {
    }
}
