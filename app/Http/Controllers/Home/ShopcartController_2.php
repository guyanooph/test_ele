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
        if($request->session()->has("shopcart")){
            $shopcart = $request->session()->get("shopcart");
            if(array_key_exists($foodid,$shopcart[$shopid]['shopcart'])){
                $shopcart[$shopid]['shopcart'][$foodid]['num'] += $m;
                $shopcart[$shopid]['shopcart'][$foodid]['total'] += $food->price * $m;
                $shopcart[$shopid]['total'] += $food->price * $m;
                $shopcart[$shopid]['num'] += $m;
                if($shopcart[$shopid]['shopcart'][$foodid]['num'] = 0){
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

    public function cart(Request $request)
    {
        $cart_items = array();
        $shop_cart = $request ->cookie('shop_cart');
        $shop_cart_arr = $shop_cart !=null ? explode(',',$shop_cart) : array();
        // 判断用户是否登录
        $user = $request -> session() -> get('user','');
        if($user !=''){
            // 同步完成购物车 清空COOKIE
            $cart_items = $this -> syncCart($user->id,$shop_cart_arr);
            return response()->view('cart.cart_list',['cart_items' => $cart_items])->withCookie('shop_cart',null);
        }
        foreach($shop_cart_arr as $key =>$value){
            $index = strrpos($value,':');
            $cart_item = new Cart();
            $cart_item->id = $key;
            $cart_item -> product_id = substr($value,0,$index);// 商品id
            $cart_item ->count = ((int)substr($value,$index+1));// 商品数量
            $cart_item -> product = Article::find($cart_item -> product_id);
            if($cart_item != null){
                array_push($cart_items,$cart_item);
            }
        }
        return view('cart.cart_list')->with('cart_items',$cart_items);
    }


    private function syncCart($mid,$shop_cart_arr)
    {
        $cart_items = Cart::where('userid',$mid)->get();
        $cart_items_arr = array();
        // 循环COOKIE中的商品数据
        foreach($shop_cart_arr as $val){
            $index = strpos($val,':');
            $product_id = substr($val, 0, $index);
            $count = (int) substr($val,$index + 1);
            $exist = false;// 用于标注COOKIE中数据是否存在数据库中
            // 循环查询出来的购物车商品数据
            foreach($cart_items as $temp){
                // 判断末登录时购物车中product_id 是否存在 数据库中
                if($temp -> product_id == $product_id){
                    // 判断购物数量 如果小于COOKIE中的数量 就修改数据库中的数据
                    if($temp->count < $count){
                        $temp -> count = $count;
                        $temp -> save();
                    }
                    $exist = true;
                    break;
                }
            }
            // 不存在则存储进来
            if($exist == false){
                $cart_item = new Cart();
                $cart_item ->userid = $mid;
                $cart_item ->product_id = $product_id;
                $cart_item ->count = $count;
                $cart_item -> save();
                $cart_item -> product = Article::find($cart_item ->product_id);
                array_push($cart_items_arr,$cart_item);
            }
        }
        // 为每个对像附加产品对像便于显示
        foreach($cart_items as $cart_item){
            $cart_item -> product = Article::find($cart_item ->product_id);
            array_push($cart_items_arr,$cart_item);
        }
        return $cart_items_arr;
    }

    public function delcart(Request $request)
    {
        $id = $request -> input('id','');
       // 用户登录的情况下
        $user = $request -> session()->get('user','');
        if($id ==''){
            return json_encode(['status'=>0,'msg'=>'操作有误，请重试！']);
        }
        if($user !=''){
            $res = Cart::where(['userid'=>$user->id,'product_id'=>$id])->delete();
            if($res){
                return json_encode(['status'=>1,'msg'=>'删除成功！']);
            }else{
                return json_encode(['status'=>0,'msg'=>'删除失败，请重试！']);
            }
        }
        // 用户没登录的情况
        $shop_cart = $request ->cookie('shop_cart','');// 从cookie里面获取购物车数据
        $shop_cart_arr = ($shop_cart !=null ? explode(',',$shop_cart) : array());
        foreach($shop_cart_arr as $key =>$value){
            $index = strrpos($value, ':');
            $product_id = substr($value, 0 ,$index);
            // 存在删除
            if(in_array($product_id,[$id])){
                array_splice($shop_cart_arr,$key,1);
                continue;
            }
        }
        // 修改后的数据重新写入COOKIE
        return response(json_encode(['status'=>1,'msg'=>'删除成功！']))->withCookie('shop_cart',implode(',',$shop_cart_arr));
    }

    public function test(Request $request)
    {
        $request->session()->put("a",[1,2,34]);
        $a = $request->session()->get("a"); 
        $a[0] = "a";
        $request->session()->put("a",$a);
        dd($request->session()->get("a"));
    }
}
