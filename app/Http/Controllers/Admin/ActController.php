<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//导入七牛相关类
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use zgldh\QiniuStorage\QiniuStorage;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("ok");
        //需要统计一个浏览总数，作品数量
        $adminuser = \Session::get('adminuser');
        $users = \DB::table('admin_user')->where('name',$adminuser->name)->first();
        if($users->cityid == '-请选择-'){
            $list = \DB::table('act')->paginate(2);
            return view('admin.act.index',compact('list'));
        }else{
            $cityid = $users->cityid;
            $list = \DB::table('act')->where('cityid',$cityid)->paginate(2);
            return view("admin.act.index",compact('list'));
        }
    }

    //搜索活动
    public function child(Request $request)
    {
         $adminuser = \Session::get('adminuser');
        $users = \DB::table('admin_user')->where('name',$adminuser->name)->first();
        if($users->cityid == '-请选择-'){
            $list = \DB::table('act')->paginate(2);
            return view("admin.act.child",["list"=>$list,'where'=>$where]);
        }else{
            $cityid = $users->cityid;
            $list = \DB::table('act')->where('cityid',$cityid)->paginate(2);
            return view("admin.act.child",["list"=>$list,'where'=>$where]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminuser = \Session::get('adminuser');
        $users = \DB::table('admin_user')->where('name',$adminuser->name)->first();
        if($users->cityid == '-请选择-'){
            return view("admin.act.create");
        }else{
            $cityid = $users->cityid;
            return view("admin.act.create_user",compact('cityid'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('prc');
        //dd($request);
        //获取要添加的数据
        $data = $request->only("name","picname",'rule',"cityid","viedo","introduce","prize");
		$data['create_date'] = date('Y-m-d');
        $adminuser = \Session::get('adminuser');
        $data['create_person'] = $adminuser->name;
        $data['status'] = "1";
        //dd($data);
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
        $id = \DB::table('act')->insertGetId($data);
        //dd($id);
        //判断
        if($id>0){
            $info = "活动添加成功！";
        }else{
            $info = "活动添加失败！";
        }
        
        return redirect("admin/act")->with("err",$info);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //查看活动详情
        $act_details = \DB::table('act')->where('id',$id)->first();
        //dd($act_details);
        //根据活动id查询相应作品
        $works = \DB::table('works')->where('actid',$act_details->id)->get();
        //dd($works);
        return view('admin.act.details',compact('act_details','works'));
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
