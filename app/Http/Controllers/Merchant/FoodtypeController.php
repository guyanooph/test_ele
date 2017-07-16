<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Food_type;

class FoodtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$list = \DB::select("select * from food_type where shopid order by concat(path,id) asc");
        $list = Food_type::where("shopid",session('merchantname')->shopid)->get();
        return view('merchant.foodtype.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Food_type::where("shopid",session('merchantname')->shopid)->get();
        //处理信息
        /* foreach($list as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->title = str_repeat("&nbsp;",($m-1)*8)."|--".$v->title;
        } */
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
        /* $pid = $data['pid'];
        if($pid==0){
            $data['path']="0,";
        }else{
            $type = \DB::table("food_type")->where("id",$pid)->first();
            $data['path'] = $type->path.$pid.",";
            
        } */
        
        //执行添加
        $id = Food_type::insertGetId($data);
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
        $type = \DB::table("food_type")->where("id",$id)->first(); //获取要编辑的信息
        return view("merchant.foodtype.edit",["type"=>$type]);
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
        
        //表单验证
        $this->validate($request, [
            'title' => 'required|max:16',
        ]);
        $data = $request->only("title");
        //$data['updated_at'] = time();
        $id = \DB::table("food_type")->where("id",$id)->update($data);
        
        if($id>=0){
            return redirect('merchant/foodtype');
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
        
		//dd("aaa");//先判断当前类别下是否存在子类别
        $m = \DB::table('food_type')->where('pid',$id)->count();
        /* if($m>0){
            return back()->with("err","禁止删除");
        }   */
      
        \DB::table('food_type')->delete($id);
        return redirect("merchant/foodtype")->with("err","删除成功！");
    }

}
