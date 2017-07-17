<?php
//菜品分类管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Redis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=\DB::table('mer_mid')->simplePaginate(10);


       return view("admin.ftype.index",["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    //执行添加
    public function store(Request $request)
    {
       $data=$request->only('title',"status");
       $data['created_at']=date("Y-m-d H:i:s",time());
      
       if(\DB::table("mer_mid")->insert($data)){
           \Redis::sadd();

         return back()->with("err","添加成功");
    }
        
      
   
     //$request->session()->flash("err",$info);
    // return response()->json($info);
     //
      //return back()->with("err",$info);
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
       $list=\DB::table("mer_mid")->where("id",$id)->first();
     
       return view("admin.ftype.edit",["list"=>$list]);
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
        $data['title'] = $request->title;
        $data['status'] = $request->status;
        $res = \DB::table('mer_mid')->where('id',$id)->update($dara);
        if($res){
            return redirect('admin/ftype')->with('msg','分类修改成功');
        }else{
            return redirect('admin/ftype')->with('msg','分类修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //分类删除操作
    public function destroy($id)
    {
        $b = \DB::table('mer_sid')->where('mid',$id)->first();
        //dd($b);
        if($b == null) {
            $a = \DB::table("mer_mid")->delete($id);
            if ($a > 0) {
                $info = "删除成功";
            } else {
                $info = "删除失败";
            }
        }else{
            $info = "请先删除子分类再执行操作";
        }

        return back()->with("err",$info);
    }


//加载子类别添加页面
    public function storyEr(Request $request)
    {       $data=$request->only("mid","title");//获取表单中的商家id（mid），子类名称（title）
            $data['created_at'] = date("Y-m-d H:i:s",time());
        if(\DB::table("mer_sid")->insert($data)){
            return back()->with("err","添加子类别成功");
    }
}
}