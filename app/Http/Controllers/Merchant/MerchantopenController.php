<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchantopen;

class MerchantopenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$table = merchantopen::all();//查询所有数据
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
        return view("merchant.merchantopen.index",["table"=>$table]);//加载商家管理
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		//return view("merchant.merchantopen.add");//加载商家添加
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
