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

    //查看待审核商家详情
    public function detail($id)
    {
        //待审核商家的注册信息详情
        $list=\DB::table("mer_register")->where("id",$id)->where("state","1")->first();
        //dd($list);
        return view("admin.shop.detail",['list'=>$list]);
    }

    //商家审核操作
    public function check($id,$state)
    {
        //修改商家状态  1：未审核 2：审核通过 3审核未通过 4，商家负面信息太多，暂时拉黑
        $res1 = \DB::table('mer_register')->where('id',$id)->update(['state'=>$state]);
        $res2 = \DB::table('merchant')->where('shopid',$id)->update(['state'=>$state]);
        if($res1 && $res2){

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
        //dd($list);
       //获取商家的店铺情况 商家表
       $merchant=\DB::table("merchant")->where("shopid",$list->id)->first();

        //将信息添加进视图
       return view("admin.shop.detailCom",['list'=>$list,'merchant'=>$merchant]);
   }


   //商家违规禁用操作
    public function checkCom($id,$state)
    {
        //执行商家状态修改
        $res1 = \DB::table('mer_register')->where("id",$id)->update(["state"=>$state]);
        $res2 = \DB::table('merchant')->where("shopid",$id)->update(["state"=>$state]);
        if($res1 && $res2){
            return redirect("admin/shopCom")->with('err',"禁用成功");
        }

    }



    //加载禁用商家列表
    public function indexDisabled()
    {
        //获取商家 mer_register的信息
        $list=\DB::table('mer_register')->where("state",4)->paginate(5);
        //获取商家最近一次登录时间
        return view("admin.shop.indexDisabled",['list'=>$list]);
    }

    //查看禁用商家详情
    public function detailDisabled($id)
    {
        //待审核商家的注册信息详情
        $list=\DB::table("mer_register")->where("id",$id)->where("state","4")->first();
        //dd($list);
        return view("admin.shop.detailDisabled",['list'=>$list]);
    }

    //商家解禁操作
    public function checkDisabled($id,$state)
    {
        //执行商家状态修改
        $res1 = \DB::table('mer_register')->where("id",$id)->update(["state"=>$state]);
        $res2 = \DB::table('merchant')->where("shopid",$id)->update(["state"=>$state]);
        if($res1 && $res2){
            return redirect("admin/disabled")->with('err',"解禁成功");
        }

    }

    //加载未通过审核商家列表
    public function indexFail()
    {
        //获取商家 mer_register的信息
        $list=\DB::table('mer_register')->where("state",3)->paginate(5);
        //获取商家最近一次登录时间
        return view("admin.shop.indexFail",['list'=>$list]);
    }

    //查看禁用商家详情
    public function detailFail($id)
    {
        //待审核商家的注册信息详情
        $list=\DB::table("mer_register")->where("id",$id)->where("state","3")->first();
        //dd($list);
        return view("admin.shop.detailFail",['list'=>$list]);
    }

    //商家未通过审核再次审核操作
    public function checkFail($id,$state)
    {
        //执行商家状态修改
        $res1 = \DB::table('mer_register')->where("id",$id)->update(["state"=>$state]);
        $res2 = \DB::table('merchant')->where("shopid",$id)->update(["state"=>$state]);
        if($res1 && $res2){
            return redirect("admin/fail")->with('err',"再次审核成功");
        }

    }
}
