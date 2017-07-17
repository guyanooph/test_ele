<?php
//商家管理控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //待审核商家页面
    public function index()
    {
        //查询mer_register表中状态为1：未审核的商家
        $list=\DB::table("mer_register")->where("state","1")->paginate(5);
        return view("admin.shop.index",["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //查看待审核商家详情
    public function detail($id)
    {
        //待审核商家的注册信息详情
        $list=\DB::table("mer_register")->where("id",$id)->where("state","1")->first();

        return view("admin.shop.detail",['list'=>$list]);
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

    //商家审核操作
    public function check($id,$state)
    {
        //修改商家状态  1：未审核 2：审核通过 3审核未通过 4，商家负面信息太多，暂时拉黑
        if(\DB::table('mer_register')->where('id',$id)->update(['state'=>$state])){

            return redirect("admin/shop/index")->with("err","审核完毕");
        };

    }
    //加载普通商家信息
    public function indexCom()
    {
        //获取商家 mer_register的信息
        $list=\DB::table('mer_register')->where("state",2)->paginate(5);
        //获取商家最近一次登录时间
        return view("admin.shop.indexCom",['list'=>$list]);
    }

    //加载普通商家的详情
   public function detailCom($id)
   {
       //获取商家的注册信息  商家注册表
       $list=\DB::table("mer_register")->where("state",2)->where('id',$id)->first();

       //获取商家的店铺情况 商家表
       $merchant=\DB::table("merchant")->where("shopid",$list->id)->first();

        //将信息添加进视图
       return view("admin.shop.detailCom",['list'=>$list,'merchant'=>$merchant]);
   }

   //商家违规拉黑操作
    public function checkCom($id,$state)
    {
        //执行商家状态修改
        if(\DB::table('mer_register')->where("id",$id)->update(["state"=>$state])){
            return redirect("admin/shopCom")->with('err',"拉黑成功");
        }

    }
}
