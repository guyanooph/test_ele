<?php
//普通会员管理器
namespace App\Http\Controllers\Admin;

use App\Models\Admin_user;
use App\Models\Admin_role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use zgldh\QiniuStorage\QiniuStorage;
use Illuminate\Support\Facades\Hash;
//use zgldh\QiniuStorage\QiniuFilesystemServiceProvider;
class UserController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    //普通管理员信息
    public function index()
    {


        $list = \DB::table("admin_user")->paginate(10);
        //管理员表里的role字段替换成文本
        foreach($list as $v){
            $aa = \DB::table('admin_role')->where('id',$v->role)->first();
            $v->role = isset($aa->role)?$aa->role:"尚未分配";
        }
        //dd($list);
        return view("admin.user.index", ["list" => $list]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Admin_role::all();
        //dd($roles);
        return view("admin.user.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //执行普通管理员添加
    public function store(Request $request)
    {
        //dd($_FILES);

        //判断是否有文件上传
        if ($request->hasFile('picname')) {
            //获取文件，file对应的是前端表单上传input的name
            $file = $request->file("picname");
            //初始化
            $disk = QiniuStorage::disk("qiniu");
            //重命名文件
            $filename = md5($file->getClientOriginalName() . time() . rand()) . "." . $file->getClientOriginalExtension();
            //判断是否上传成功
            $bool = $disk->put('upload/image' . $filename, file_get_contents($file->getRealPath()));
            if ($bool) {
                // $path = $disk->downloadUrl('iwanli/image_'.$fileName);
                // print_r($path);die;
                $path = $disk->downloadUrl('upload/image'. $filename);
            } else {
                return '上传失败';
            }

        }else{
        return '没有文件';
    }


        $data['picname'] = $filename;
        //获取表单中的姓名和密码
        $data['name'] = $request->input('name');
        $data['password'] = HASH::make($request->input('password'));
        $data['phone'] = $request->input('phone');
        //dd($request->input('role'));
        $data['role'] = $request->input('role');
        //dd($data['role']);
        $data['addtime'] = date("Y-m-d H:i:s", time());
            //执行添加
        //dd($data);
        $res1 = \DB::table('admin_user')->insertGetId($data);
        $info['uid'] = $res1;
        $info['rid'] = $data['role'];
        $res2 = \DB::table('u_r')->insertGetId($info);
        if ($res1 && $res2) {
        return redirect("admin/user")->with('err', "添加成功");
    }

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
        //dd($a);
        $a ->role = \DB::table('admin_role')->where('id',$a->role)->first()->role;
        //dd($a);
        $roles = Admin_role::all();
        return view("admin.user.edit",["v"=>$a,'roles'=>$roles]);
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

        //dd($request->role);
        $rid = \DB::table('admin_role')->where('role',$request->role)->first()->id;
        //dd($rid);
        $data['name']=$request->name;

       $data['password']=HASH::make($request->password);
       $data['updated_at']=date("Y-m-d H:i:s",time());
       $data['role'] = $rid;
       $res1 = \DB::table("admin_user")->where("id",$id)->update($data);
       $info['rid'] =  $rid;
       $res2 = \DB::table("u_r")->where("uid",$id)->update($info);
      
       if($res1 && $res2){

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
        $id2 = \DB::table('u_r')->where('uid',$id)->first()->id;
        $b = \DB::table('u_r')->delete($id2);

        if($a && $b){
            $info="删除成功";
        }else{
            $info="删除失败";
        }
        return redirect("admin/user")->with("err",$info);
    }
}
