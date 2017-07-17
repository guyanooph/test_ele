<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Orders;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$table = Orders::where('shopid',session('merchantname')->shopid)->whereNotIn("status", [0])->paginate(10);//查询所有数据
		/* //判断并封装搜索条件
        $params = array();
        if(!empty($_GET['name'])){
           $table->where("name","like","%{$_GET['name']}%");
           $params['name'] = $_GET['name']; //维持搜索条件
        }
         /*  ->paginate(10); */
        // $list = $db->get(); //获取全部
        //$list = $table->sortBy("id"); //10条每页浏览
		//dd($list); */
		//return "你好！";
        return view("merchant.order.index",["table"=>$table]);//加载商家管理
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//return "你好！";
		return view("merchant.order.add");//加载订单添加页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $data = $request->all();//获取要添加的参数
        unset($data['_token']);//移除_token参数
		//dd($data);
        //执行添加
        $id = \DB::table("order")->insertGetId($data);
        //判断
        if($id>0){
            $add = "订单信息添加成功！";
        }else{
            $add = "订单信息添加失败！";
        }
        //return "你好！";
        //return view("merchant.order.index",['add'=>$add]);
        return redirect("merchant/order")->with("err",$add);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //加载修改页面
		//return "good";
		$table = Orders::where('id',$id)->first();//获取单条信息参数
		return view("merchant.order.edit",['order'=>$table]);//加载页面
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //执行修改
		$data = $request->all();//获取提交的参数
		unset($data['_token']);//移除提交的_token
		//dd($data);
		$table =\DB::table("orders")->where("id",$id)->update($data);
		if($table>0){
            return redirect('merchant/order');
        }else{
            return back()->with("err","修改失败!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
		\DB::table("order")->where("id",$id)->delete();
        //return "hhhh";
        return redirect('merchant/order')->with("err","删除成功");
    }
}
