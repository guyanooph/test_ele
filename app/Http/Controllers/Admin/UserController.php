<?php
//普通会员管理器
namespace App\Http\Controllers\Admin;

use App\Models\Admin_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
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
    public function store(Request $request)
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