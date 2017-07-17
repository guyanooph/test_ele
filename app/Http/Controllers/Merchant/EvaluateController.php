<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Evaluate;

class EvaluateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$evaluate = Evaluate::all();
		/* foreach($evaluate as $v){
			dd($v->anonymous);
		} */
        return view("merchant.evaluate.index",["eva"=>$evaluate]);//加载评分浏览
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
		$table = Evaluate::where("shopid",$shopid)->first();//获取单条信息参数
		//dd($table);
		return view("merchant.evaluate.edit",['list'=>$table]);//加载页面
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
		//dd($id);
		$data['shop_content']= $request->shop_content;
		//dd($data);
		$res = Evaluate::where('shopid',$id)->update($data);
		if($res){
			return redirect('merchant/evaluate')->with('msg','回复评价成功');
		}else{
			return redirect('merchant/evaluate')->with('msg','回复评价失败');
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
