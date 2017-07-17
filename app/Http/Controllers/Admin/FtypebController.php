<?php
//菜品分类管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FtypebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=\DB::table('mer_sid')->simplePaginate(10);
        foreach($list as $v){
            //dd($v->mid);
            //我想把父类名称塞进去去首页展示，但是不用$v已有字段无法弥补，所以暂用状态字段去传递
             $v->status = \DB::table('mer_mid')->where('id',$v->mid)->first()->title;
        }
       return view("admin.ftypeb.index",["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->only('title',"status");
       $data['created_at']=date("Y-m-d H:i:s",time());
      
       if(\DB::table("mer_mid")->insert($data)){
            $info="添加成功";
       }else{
            $info="添加失败";
       }
    
     //$request->session()->flash("err",$info);
    // return response()->json($info);
     //return redirect("admin/ftype")->with("err",$info);
      return back()->with("err",$info);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
     
        \DB::table("mer_sid")->where("id",$id)->delete();
                 return back()->with("err","删除成功");

    }

    public function doEdit()
    {
        $title=\DB::table("mer_mid")->get();
       print_r($title);
    }
}
