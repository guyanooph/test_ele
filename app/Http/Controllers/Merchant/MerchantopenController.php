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
    public function index()
    {
		$table = Merchantopen::all()->where('shopid','=',1);//查询所有参数
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
        //加载修改页面
		//return "你的厚爱！";
		$table = merchantopen::where("id",$id)->first();
		
		return view("merchant.merchantopen.edit",['merchantopen'=>$table]); 
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
		//$data = $request->only('name','opentime','overtime','givemoney','method','state','money','num');//获取要添加的参数
		$data = $request->all();
        unset($data['_token']);//移除_token参数
        unset($data['_method']);//移除_token参数
		/* $this->validate($request, [//执行表单验证
            'name' => 'required|max:16',
        ]);
        $data = $request->only("name","state");
        $data['updated_at'] = time(); */
        $table = \DB::table("merchant_open")->where("id",$id)->update($data);
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
        //执行删除
		\DB::table("merchant_open")->where("id",$id)->delete();
		return redirect('merchant/merchantopen');
    }
}
