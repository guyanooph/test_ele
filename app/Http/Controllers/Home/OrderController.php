<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Merchant;

class OrderController extends Controller
{
    //
    public function index(Request $request, $shopid)
    {
        $location = $request->session()->get("location");
        $ob = Merchant::where("shopid",$shopid)->first();
        $addressList = Address::where("userid",$request->session()->get("user")->id)->get();
        $shopcart = $request->session()->get("shopcart")[$shopid];
        $user = $request->session()->get("user");
        return view("home.personal.orderCheckout", compact('addressList','shopcart','location','ob','user'));
    }
}
