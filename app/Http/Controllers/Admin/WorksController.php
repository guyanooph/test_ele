<?php
//作品管理控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //待审核作品页面
    public function index()
    {
        //dd('ok');
        //查询act中状态为1：待审核的作品
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list=\DB::table("works")->where("status","1")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid = \DB::table('act')->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                 \DB::table('works')->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list =\DB::table("works")->where('cityid',$cityid)->where("status","1")->paginate(1);
        }
        return view("admin.works.index",["list"=>$list]);
    }

    public function child(Request $request)
    {
        //查询act中状态为1：待审核的作品

        $db = \DB::table('works')->orderBy("id","desc");
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
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list=$db->where("status","1")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid = \DB::table('act')->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                 $db->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list =$db->where('cityid',$cityid)->where("status","1")->paginate(1);
        }
        return view("admin.works.child",["list"=>$list,'where'=>$where]);
    }

    //查看待审核作品详情
    public function detail($id)
    {
        //待审核商家的注册信息详情
        $list=\DB::table("works")->where("id",$id)->where("status","1")->first();
        //dd($list);
        return view("admin.works.detail",['list'=>$list]);
    }

    //商家审核操作
    public function check($id,$status)
    {
        //修改商家状态  1：未审核 2：审核通过 3审核未通过 
        $res1 = \DB::table('works')->where('id',$id)->update(['status'=>$status]);
        if($res1){

            return redirect("admin/works/index")->with("err","审核完毕");
        }

    }


    //加载已审核作品信息
    public function indexCom()
    {
        // //查询act中状态为2：已审核的作品
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list=\DB::table("works")->where("status","2")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid = \DB::table('act')->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                 \DB::table('works')->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list =\DB::table("works")->where('cityid',$cityid)->where("status","2")->paginate(1);
        }
        return view("admin.works.indexCom",['list'=>$list]);
    }

     public function childCom(Request $request)
    {
        //查询works中状态为2：已审核的作品

        $db = \DB::table('works')->orderBy("id","desc");
        $where = [];
        //判断搜索账号是否存在
        if(!empty($request->has('name'))){
            //获取搜索账号
            $name = $request->input('name');
            //拼装搜索条件
            $db->where("name","like","%{$name}%");
            $where ['name'] = $name;
        }

        // //查询act中状态为2：已审核的作品
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list= $db->where("status","2")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid =  $db->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                  $db->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list = $db->where('cityid',$cityid)->where("status","2")->paginate(1);
        }
        return view("admin.works.childCom",["list"=>$list,'where'=>$where]);
    }

    //加载已审核作品的详情
   public function detailCom($id)
   {
       //获取作品信息
       $list=\DB::table("works")->where("status",2)->where('id',$id)->first();
       return view("admin.works.detailCom",compact('list'));
   }


   //作品违规不通过操作
    public function checkCom($id,$state)
    {
        //执行商家状态修改
        $res1 = \DB::table('works')->where("id",$id)->update(["status"=>$state]);
        if($res1){
            return redirect("admin/shopCom")->with('err',"已更改为审核不通过");
        }

    }


    //加载未通过审核作品列表
    public function indexFail()
    {
        //查询works中状态为3：未通过审核的作品
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
        if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list=\DB::table("works")->where("status","3")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid = \DB::table('act')->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                 \DB::table('works')->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list =\DB::table("works")->where('cityid',$cityid)->where("status","3")->paginate(1);
        }
        return view("admin.works.indexFail",['list'=>$list]);
    }

     public function childFail(Request $request)
    {
        //查询works中状态为3：已审核的作品

        $db = \DB::table('works')->orderBy("id","desc");
        $where = [];
        //判断搜索账号是否存在
        if(!empty($request->has('name'))){
            //获取搜索账号
            $name = $request->input('name');
            //拼装搜索条件
            $db->where("name","like","%{$name}%");
            $where ['name'] = $name;
        }

        // //查询act中状态为2：已审核的作品
        $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
         if($adminuser->cityid =="-请选择-"){
            //加载所有待审核的作品
            $list= $db->where("status","3")->paginate(1);
            //dd($list);
        }else{
            //加载所在地区的待审核的作品
            $cityid = $adminuser->cityid;
            //查出活动id
            $actid =  $db->where('cityid',$cityid)->pluck('id');
            //把城市id写数据库
            foreach ($actid as $k => $v) {
                  $db->where('actid',$actid)->update(['cityid'=>$cityid]);
            }
            //根据新进数据库的id查出所有作品
            $list = $db->where('cityid',$cityid)->where("status","2")->paginate(1);
        }
        return view("admin.works.childFail",["list"=>$list,'where'=>$where]);
    }


    //查看未通过审核作品列表
    public function detailFail($id)
    {
        //未通过审核作品列表
        $list=\DB::table("works")->where("id",$id)->where("status","3")->first();
        //dd($list);
        return view("admin.works.detailFail",['list'=>$list]);
    }

    //商家未通过审核再次审核操作
    public function checkFail($id,$state)
    {
        //执行商家状态修改
        $res1 = \DB::table('works')->where("id",$id)->update(["status"=>$state]);
            return redirect("admin/fail")->with('err',"再次审核成功");
        }
}
