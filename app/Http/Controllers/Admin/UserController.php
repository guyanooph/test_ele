<?php
//普通会员管理器
namespace App\Http\Controllers\Admin;

use App\Models\Admin_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use zgldh\QiniuStorage\QiniuStorage;

//use zgldh\QiniuStorage\QiniuFilesystemServiceProvider;
class UserController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $list= \DB::table("admin_user")->paginate(3);
        return view("admin.user.index",["list"=>$list]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vstore(Request $request)
    { 
            // $data=$request->only('name','password');
             $data['name']=$request->input('name');
           
            $pass=$request->input("password");
         
            $data['password']=md5($pass);

            $data['addtime']=date("Y-m-d H:i:s",time());
            //$data['addtime']=time();

           
                $id=\DB::table('Admin_user')->insertGetId($data);
                if($id>0){
                    $info="添加管理员成功";
                }else{
                    $info="添加信息失败";
                }


            return redirect('admin/user')->with("err",$info);
    }
    //文件上传到七牛
    //public function uploadFile(Request $request)
    public function store(Request $request)
    {

        //判断是否有文件上传
        if($request->hasFile('picname')) {
            //获取文件，file对应的是前端表单上传input的name
            $file =$request->file("picname");
            //初始化
            $disk =QiniuStorage::disk("qiniu");
            //重命名文件
            $fileName  =md5($file->getClientOriginalName().time().rand()).".".$file->getClientOriginalExtension();
            //将文件名放入数组$data中
            $data['picname']=$fileName;
             //获取表单中的姓名和密码
             $data['name']=$request->input('name');
             $data['password'] = encrypt($request->input('password'));
             $data['phone'] = $request->input('phone');
             $data['addtime'] = date("Y-m-d H:i:s",time());         
            //执行添加
            if(\DB::table('Admin_user')->insert($data)){
            //上传到七牛
            $bool = $disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
            //判断是否上传成功
          if($bool){
              // $path = $disk->downloadUrl('iwanli/image_'.$fileName);
            // print_r($path);die;
            
              return redirect("admin/user")->with('err',"添加成功");
            }
            return '上传失败';
        }
    }
        return '没有文件';
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
        $a=Admin_user::find($id);

        return view("admin.user.edit",["v"=>$a]);
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


        
         $data['name']=$request->input("name");

       $data['password']=md5($request->input("password"));
       $data['updated_at']=date("Y-m-d H:i:s",time());
       
      
       if(\DB::table("admin_user")->where("id",$id)->update($data)){

       return redirect("admin/user")->with("err","修改成功");
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
        $a =Admin_user::destroy($id);
        //$a = $b->delete($id);
       // $a=\DB::table("admin_user")->delete($id);
       

        if($a){
            $info="删除成功";
        }else{
            $info="删除失败";
        }
        return redirect("admin/user")->with("err",$info);
    }
}
