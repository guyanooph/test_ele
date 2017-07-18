<?php
//角色管理器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin_role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $list=\DB::table('admin_role')->paginate(3);

       
        //return $list;die;
        return view("admin.role.index",['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $b=$request->only("role",'status');
        $b['created_at']=date("Y-m-d H:i:s",time());
        if(Admin_role::insert($b)){
            $info="添加成功";
        }else{
            $info="添加失败";
        }

       
        return redirect("admin/role")->with("err",$info);
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



        $list=\DB::table('admin_role')->where("id",$id)->first();
        return view("admin.role.edit",['list'=>$list]);
       
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

        $db=$request->only("role","status");
        $db['updated_at']=date("Y-m-d H:i:s",time());
        $a=\DB::table("admin_role")->where("id",$id)->update($db);//执行修改
        if($a){
            $info="修改成功";
        }else{
            $info="修改失败";
        }
        return redirect("admin/role")->with("err",$info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $a=\DB::table('admin_role')->delete($id);
        if($a>0){
            $info="删除成功";
        }else{
            $info="删除失败";
        }
         \Session::flash('err',$info);
       return redirect("admin/role");   
    }

    //为当前角色分配节点信息
    public function loadNode($rid=0)
    {
        
        //获取所有节点信息
        $nodelist = \DB::table("admin_node")->get();

        //获取当前角色的节点ID
        //$nids = \DB::table("admin_node")->where("rid",$rid)->list;
        $nids = \DB::select("select nid from r_n where rid={$rid}")->toArray();//获取r_n表中的角色节点ID nid
            
        //加载模板
        return view("admin.role.nodelist",["rid"=>$rid,"nodelist"=>$nodelist,"nids"=>$nids]);
     
 }
    //保存角色节点信息
    public function saveNode(Request $request)
    {
        //dd($request);
        $rid = $request->input("rid");
        //清除数据
        \DB::table("r_n")->where("rid",$rid)->delete();

        $nids=$request->input("nids");
        if(!empty($nids)){
            //处理添加数据
            $data = [];
            foreach($nids as $v){
                //将节点跟角色对应保存
                $data[] = ["rid"=>$rid,"nid"=>$v];
        }
        //添加数据
        \DB::table("r_n")->insert($data);        
    }
    return "节点保存成功!";
    }


}
