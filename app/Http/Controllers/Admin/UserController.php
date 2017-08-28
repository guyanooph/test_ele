<?php
namespace App\Http\Controllers\Admin;
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


        $list = \DB::table("admin_user")->paginate(3);
        //管理员表里的role字段替换成文本
        //dd($list);
        return view("admin.user.index", ["list" => $list]);

    }

    //搜索管理员
    public function child(Request $request)
    {
        $db = \DB::table('admin_user')->orderBy("id","desc");
        $where = [];
        //判断搜索账号是否存在
        if(!empty($request->has('name'))){
            //获取搜索账号
            $name = $request->input('name');
            //拼装搜索条件
            $db->where("name","like","%{$name}%");
            $where ['name'] = $name;
        }
        //dd($where);
        //每页显示6条
        $list = $db->paginate(1);
        return view("admin.user.child",["list"=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid !="-请选择-"){
             return redirect("admin/user")->with('err', "仅系统管理员可操作"); 
         }
        $roles = \DB::table('admin_type')->get();
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
        date_default_timezone_set('prc');
        //dd($request->input('cityid'));
        $password = $request->input('password');
        $password2 = $request->input('password2');
        if($password != $password2){
           return redirect("admin/user")->with('err', "密码不一致，请重新添加");
        }
        //获取表单中的姓名和密码
        $data['name'] = $request->input('name');
        $data['cityid'] = $request->input('cityid');
        $data['password'] = HASH::make($request->input('password'));
        //dd($request->input('role'));
        $data['role'] = $request->input('role');
        $adminuser = \Session::get('adminuser');
        $data['create_person'] = $adminuser->name;
        //$data['create_person'] =  "root";
        //dd($data['role']);
        $data['addtime'] = date("Y-m-d H:i:s", time());
            //执行添加
        //dd($data);
        $res = \DB::table('admin_user')->insertGetId($data);
        if ($res) {
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
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid !="-请选择-"){
             return redirect("admin/user")->with('err', "仅系统管理员可操作"); 
         }
        //仅支持修改密码
        $admin_user=\DB::table('admin_user')->find($id);
        //dd($admin_user);
        $roles = \DB::table('admin_type')->get();
        //dd($roles);
        return view("admin.user.edit",["v"=>$admin_user,"roles"=>$roles]);
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
        $password = $request->input('password');
        $password2 = $request->input('password2');
        if($password != $password2){
           return redirect("admin/user")->with('err', "密码不一致，请重新修改");
        }
        
       $data['password']=HASH::make($request->password);
       $data['updated_at']=date("Y-m-d H:i:s",time());
       $res1 = \DB::table("admin_user")->where("id",$id)->update($data);
       if($res1){

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
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid !="-请选择-"){
             return redirect("admin/user")->with('err', "仅系统管理员可操作"); 
         }
        $a=\DB::table("admin_user")->delete($id);
        
        if($a){
            $info="删除成功";
        }else{
            $info="删除失败";
        }
        return redirect("admin/user")->with("err",$info);
    }
}
