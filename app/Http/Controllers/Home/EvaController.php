<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Food_rate;
use App\Models\Food_list;
class EvaController extends Controller
{
    //
    public function index(Request $request, $id)
    {
        $rates = Rate::where('shopid', $id)->get()->toArray();
       foreach ($rates as $k=>$v){
           //$rates[$k]['foods_rate'] = Food_rate::where('commentid',$v['id'])->get()->toArray();
           $Food_rates = Food_rate::where('commentid',$v['id'])->get()->toArray();
           foreach($Food_rates as $i=>$j){
               $Food_rates[$i]['food_title'] = Food_list::where('id',$j['foodid'])->first()->title;
           }
           $rates[$k]['foods_rate'] = $Food_rates;
       }
       //dd($rates);
       return json_encode($rates);
    }
}