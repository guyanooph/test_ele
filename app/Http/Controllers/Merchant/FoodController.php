<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Food;
use App\Models\Merchant\Food_type;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$db = \DB::select("select * from food order by concat(shopid,id) asc");
		//$db = \DB::table("food");
		//$list = $db->paginate(5); //5条每页浏览
       
	   $list = Food::where('shopid', '=', 1)->paginate(1);
        
       //遍历当前数据并添加商品类别名称
       foreach($list as $v){
           $name = \DB::table("food_type")->where("id",$v->typeid)->value("title");
           $v->typename = $name; //放置进去
           
       }
        
       return view("merchant.food.index",['list'=>$list]);
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
        return view("merchant.food.create",['list'=>$list]);
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
        $data = $request->only("title",'typeid','shopid',"descr","price","stutas");
		$data['create_time'] = date('Y-m-d');
        if ($request->file('picname') && $request->file('picname')->isValid()) {
            //获取上传文件信息
            $file = $request->file('picname');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/merchant/food/",$filename);
            $data['picname'] = $filename;                   
            //return response($filename); //输出
            //exit();
        }
        
        //执行添加
        $id = Food::insertGetId($data);
        //判断
        if($id>0){
            $info = "类别信息添加成功！";
        }else{
            $info = "类别信息添加失败！";
        }
        
        return redirect("merchant/food")->with("err",$info);
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
		$food = Food::where("id",$id)->first(); //获取要编辑的信息
		$shu = $food['typeid'];
		$find = Food_type::where("id",$food['typeid'])->first(); 
		//dd($shu);
		//dd($find);
		$food['typeid'] = $find['title'];
		$list = \DB::select("select * from food_type order by concat(path,id) asc");
        //处理信息
        foreach($list as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->title = str_repeat("&nbsp;",($m-1)*4)."|--".$v->title;			 
        }	
        return view("merchant.food.edit",["type"=>$food],["list"=>$list]); 
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
        $data = $request->only("title","descr","picname","price","stutas");
        //$data['updated_at'] = time();
		
		$data['create_time'] = date('Y-m-d');
		//$path = "./upload/merchant/food/";
        if ($request->file('picnew') && $request->file('picnew')->isValid()) {
            //获取上传文件信息
            $file = $request->file('picnew');
            $ext = $file->extension(); //获取文件的扩展名 nb 
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
			if($filename != null){
				$file->move("./upload/merchant/food/",$filename);//移动上传文件
				$pic['picnew'] = $filename;
				@unlink("./upload/merchant/food/".$data['picname']);//删除原有文件			
				$data['picname'] = $pic['picnew'];  
			}
                          
            //return response($filename); //输出
            //exit();0
        }
		//dd($data);
        $id = \DB::table("food")->where("id",$id)->update($data);
        
        if($id>0){
            return redirect('merchant/food');
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
        //先判断当前类别下是否存在子类别
        /* $m = \DB::table('food')->where('pid',$id)->count();
        if($m>0){
            return back()->with("err","禁止删除");
        } */  
		$food = Food::where("id",$id)->first();
		@unlink("./upload/merchant/food/".$food['picname']);
        \DB::table('food')->delete($id);
        return redirect("merchant/food")->with("err","删除成功！");
    }
}
