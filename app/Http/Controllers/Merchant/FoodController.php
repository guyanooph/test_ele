<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Food;
use App\Models\Merchant\Food_type;

//导入七牛相关类
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use zgldh\QiniuStorage\QiniuStorage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $list = Food::where('shopid', session('merchantname')->shopid)->orderBy("id",'desc')->paginate(5);
        
       //遍历当前数据并添加商品类别名称
       foreach($list as $v){
           $name = Food_type::where("id",$v->typeid)->value("title");
           $v->typename = $name; //放置进去
           
       }
        
		$params = array();
	    if(!empty($_GET['title'])){
		   Food::all()->where("title","like","%{$_GET['title']}%");
		   $params['title'] = $_GET['title']; //维持搜索条件
	    }
       return view("merchant.food.index",['list'=>$list],['params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Food_type::where("shopid",session('merchantname')->shopid)->get();
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
        if($request->hasFile('picname')) {
            //获取文件，file对应的是前端表单上传input的name
            $file =$request->file("picname");
            //初始化
            $disk = \Storage::disk("qiniu");
 
            //重命名文件
            $fileName  =md5($file->getClientOriginalName().time().rand()).".".$file->getClientOriginalExtension();
			// return 'd';
			//上传到七牛
            $bool = $disk->put('upload/image'.$fileName,file_get_contents($file->getRealPath()));
            $data['picname'] = $fileName;
			
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
		$this->shu = $food['typeid'];
		$find = Food_type::where("id",$food['typeid'])->first(); 
		//dd($shu);
		//dd($find);
		$food['typeid'] = $find['title'];
		$info = Food_type::where("shopid",session('merchantname')->shopid)->get();
        //处理信息
        foreach($info as &$v){
            $m = substr_count($v->path,","); //获取path中的逗号
            //生成缩进
            $v->title = str_repeat("&nbsp;",($m-1)*4)."|--".$v->title;			 
        }	
        return view("merchant.food.edit",["type"=>$food],["info"=>$info]); 
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
        $data = $request->only("title","descr","price","stutas");
        //$data['updated_at'] = time();
		
		$data['create_time'] = date('Y-m-d');
		//$path = "./upload/merchant/food/";
        if($request->hasFile('picnew')) {
            //获取文件，file对应的是前端表单上传input的name
            $file =$request->file("picnew");
            //初始化
            $disk = \Storage::disk("qiniu");
 
            //重命名文件
            $fileName  =md5($file->getClientOriginalName().time().rand()).".".$file->getClientOriginalExtension();
			// return 'd';
			//上传到七牛
            $bool = $disk->put('wang/image_'.$fileName,file_get_contents($file->getRealPath()));
            $data['picname'] = $fileName;
			
            //return response($filename); //输出
            //exit();
			//dd($data);
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
        \DB::table('food')->delete($id);
        return redirect("merchant/food")->with("err","删除成功！");
    }
}
