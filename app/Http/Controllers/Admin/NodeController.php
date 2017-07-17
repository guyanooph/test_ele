<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

class NodeController extends CommonController
{
    //分页浏览信息
    public function index(Request $request)
    {
        $db = \DB::table("admin_node");
       
        $list = $db->paginate(5); //获取所有信息
        return view("admin.node.index",["list"=>$list]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.node.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
       
        //获取指定的部分数据
        $data = $request->only("name","method","url","state");
        $data['created_at'] = date("Y-m-d H:i:s",time());
    
        if(\DB::table("admin_node")->insert($data)){

                return back()->with("err","添加成功！");
        }
        
        
    }
    
    //执行删除
    public function destroy($id)
    {
        if(\DB::table("admin_node")->where("id",$id)->delete()){
            $info="删除成功";
        }

        return back()->with("err",$info);
    }
    
    //加载修改表单
    public function edit($id)
    {
        $node = \DB::table("admin_node")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.node.edit",["vo"=>$node]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        return "dd";die;
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
        $data = $request->only("name","method","url","state");
        $data['updated_at'] = time();
        $id = \DB::table("node")->where("id",$id)->update($data);
        
        if($id>0){
            return redirect('admin/node');
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
}
