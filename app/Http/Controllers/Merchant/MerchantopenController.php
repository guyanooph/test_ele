<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Merchant;

class MerchantopenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$table = Merchant::all()->where('shopid','=',1);//查询所有参数

		//$list = merchantopen::all();
		$info = Merchant::where('shopid',session('merchantname')->shopid)->first();//

        /* //判断并封装搜索条件
        $params = array();
		$list = merchantopen::all();//查询所有参数

		//判断并封装搜索条件
       /*  $params = array();
        if(!empty($_GET['name'])){
           $table->where("name","like","%{$_GET['name']}%");
           $params['name'] = $_GET['name']; //维持搜索条件
        } */
                

        //$list = $table->paginate(1); //10条每页浏览
		//dd($list); 
		//return "你好！";
        return view("merchant.merchantopen.index",["merchant"=>$info]);//加载商家管理
    }

    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($shopid)
    {
        //加载修改页面
		//return "你的厚爱！";
		$table = Merchant::where("shopid",$shopid)->first();//获取单条信息参数
		
		return view("merchant.merchantopen.edit",['merchantopen'=>$table]);//加载页面
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopid)
    {
		//dd($id);
        //执行修改
		//$data = $request->only('name','opentime','overtime','givemoney','method','state','money','num');//获取要添加的参数
		$data = $request->all();
        unset($data['_token']);//移除_token参数
        unset($data['_method']);//移除_token参数
        $table = Merchant::where("shopid",$shopid)->update($data);
        //dd($data);
        if($table>0){
            return redirect('merchant/merchantopen');
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

    }
}
