<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\food_type;

class FoodtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$list = \DB::select("select * from food_type order by concat(path,id) asc");
        
        //处理信息
        foreach($list as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->title = str_repeat("&nbsp;",($m-1)*8)."|--".$v->title;
        }
        return view('merchant.foodtype.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = \DB::select("select * from food_type order by concat(path,id) asc");
        
        //处理信息
        foreach($list as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->title = str_repeat("&nbsp;",($m-1)*8)."|--".$v->title;
        }
        return view("merchant.foodtype.create",['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取要添加的数据
        $data = $request->only("title",'shopid');
        $pid = $data['shopid'];
        if($pid==0){
            $data['path']="0,";
        }else{
            $type = \DB::table("food_type")->where("id",$pid)->first();
            $data['path'] = $type->path.$pid.",";
        }
        
        //执行添加
        $id = \DB::table("food_type")->insertGetId($data);
        //判断
        if($id>0){
            $info = "类别信息添加成功！";
        }else{
            $info = "类别信息添加失败！";
        }
        
        return redirect("merchant/foodtype")->with("err",$info);
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
