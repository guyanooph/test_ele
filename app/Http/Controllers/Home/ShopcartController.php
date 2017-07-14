<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class ShopcartController extends Controller
{
    public function addCart(Request $request)
    {
        $aid = $request ->input('aid','');
        $shop_count = $request ->input('count','');
        // 如果当前用户已经登录
        $user = $request ->session()->get('user','');
        if($user !=''){
            $cart_items = Cart::where('userid',$user->id)->get();
            $exist = false; // 用于标注COOKIE中的数据是否存在于数据库
            foreach($cart_items as $cart_item){
                // 判断末登录时购物车中product_id 是否存在 数据库中
                if($cart_item->product_id == $aid){
                    // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
                    $shop_count !=''? $cart_item -> count = $shop_count : $cart_item -> count ++ ;
                    $cart_item -> save();
                    $exist = true;
                    break;
                }
            }
            // 如果不存在数据库中，就添加进数据库
            if($exist == false){
                $cart_item = new Cart();
                $cart_item ->product_id = $aid;
                $cart_item ->count = 1;
                $cart_item ->userid = $user->id;
                $cart_item ->save();
            }
            return json_encode('添加成功！');
        }
        // 用户没有登录的情况下
        $shop_cart = $request->cookie('shop_cart');
        $shop_cart_arr = ($shop_cart != null ? explode(',',$shop_cart) : array());
        $count = 1; // 商品默认数据
        foreach($shop_cart_arr as &$value){ // 一定要传引用
            $index = strrpos($value,':'); // 商品个数
            if(substr($value,0,$index) == $aid){
                // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
                $count = $shop_count !=''? $shop_count : ((int) substr($value,$index + 1)) + 1;
               // $count =((int) substr($value,$index + 1)) + 1; // 商品数量+1;
                $value = $aid. ":".$count; // 改变购物车商品的数量
                break;
            }
        }
        // $conut是否 = 1  如果是就把商品加入到数组中
        if($count == 1){
            array_push($shop_cart_arr,$aid.":".$count);
        }
        $msg = $shop_count != '' ? '修改成功！' : '添加成功！';
        return response(json_encode($msg))->withCookie('shop_cart',implode(',',$shop_cart_arr));
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
}
