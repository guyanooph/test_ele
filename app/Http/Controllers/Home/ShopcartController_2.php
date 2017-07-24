<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Food_list;
use App\Http\Controllers\Controller;

class ShopcartController_2 extends Controller
{
    public function addCart(Request $request, $shopid, $foodid)
    {
        $t1 = microtime(true);
        $food = Food_list::find($foodid); 
        $m = $request->input("m");
        //dd($m);
        if($request->session()->has("shopcart")){
            $shopcart = $request->session()->get("shopcart");
            if(array_key_exists($foodid,$shopcart[$shopid]['shopcart'])){
                $shopcart[$shopid]['shopcart'][$foodid]['num'] += $m;
                //dd([$shopcart[$shopid]['shopcart'][$foodid]['num'],$m]);
                $shopcart[$shopid]['shopcart'][$foodid]['total'] += $food->price * $m;
                $shopcart[$shopid]['total'] += $food->price * $m;
                $shopcart[$shopid]['num'] += $m;
                if($shopcart[$shopid]['shopcart'][$foodid]['num'] <= 0){
                    unset($shopcart[$shopid]['shopcart'][$foodid]);
                    $request->session()->put("shopcart", $shopcart);
                    $t2 = microtime(true);
                    return json_encode(['total_num' => $shopcart[$shopid]['num'], 'num' => 0, 'price' => $food->price, 'status' => 1, 'time' => $t2-$t1]);
                }
                $request->session()->put("shopcart", $shopcart);
                $t2 = microtime(true);
                return json_encode(['total_num' => $shopcart[$shopid]['num'],'total' => $shopcart[$shopid]['total'],'num' => $shopcart[$shopid]['shopcart'][$foodid]['num'], 'price' => $food->price, 'status' => 1, 'time' => $t2-$t1]);
            }else{
                $shopcart[$shopid]['shopcart'][$foodid]['num'] = 1;
                $shopcart[$shopid]['shopcart'][$foodid]['total'] = $food->price;
                $shopcart[$shopid]['total'] += $food->price * $m;
                $shopcart[$shopid]['shopcart'][$foodid]['food'] = $food;
                $shopcart[$shopid]['num'] = 1;
                $request->session()->put("shopcart", $shopcart);
                $t2 = microtime(true);
                return json_encode(['total_num' => $shopcart[$shopid]['num'], 'total' => $shopcart[$shopid]['total'], 'num' => $shopcart[$shopid]['shopcart'][$foodid]['num'], 'price' => $food->price, 'title' => $food->title, 'id' => $food->id, 'status' => 0, 'time' => $t2-$t1]);
            };
        }else{
            die(" 请正常访问我的网站");
        };
    }

    public function clearCart(Request $request,$shopid)
    {
        $shopcart = $request->session()->get("shopcart");
        if($shopcart){
            $shopcart[$shopid]['shopcart'] = [];
            $request->session()->put('shopcart', $shopcart);
        }else{
            //
        }
    }

}
