<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class IndexController extends Controller
{
    
    public function index()
    {
    	//后台首页，数据统计
    	 $adminuser = \Session::get('adminuser');
        //dd($adminuser->cityid);
        //判断是否有cityid 显示无权限添加管理员
        if($adminuser->cityid =="-请选择-"){
         	//活动总数
    	$act_count = \DB::table('act')->count('id');
    	//dd($act_count);

    	//活动浏览总数  每个活动的浏览数的和 
    	$act_browse = \DB::table('act')->sum('number');
    	//dd($act_browse);

    	//作品总数
    	$works_count = \DB::table('works')->count('id');
    	//dd($works_count);

    	//每个作品投票数的和
    	$tickets_count = \DB::table('works')->sum('tickets');
    	//dd($tickets_count);
        $adminuser=\Session::get('adminuser');

        return view("admin.index",compact('adminuser','act_count','act_browse','works_count','tickets_count'));
    }else{
    	//后台首页，地方数据统计
    	$adminuser = \Session::get('adminuser');
    	//dd($adminuser->cityid);
    	$cityid = $adminuser->cityid;
         //1.活动总数
    	$act_count = \DB::table('act')->where('cityid',$cityid)->count('id');
    	//dd($act_count);

    	//2.活动浏览总数  当前地区的每个活动的浏览数的和 
    	$act_browse = \DB::table('act')->where('cityid',$cityid)->sum('number');
    	//dd($act_browse);

    	//3.作品总数,根据cityid查询出活动id，每个活动作品总数的和即为当前城市所有作品总数的和
    	//属于本地区的活动id 指定字段查询
    	//dd($cityid);
    	$act_id=\DB::table('act')->where('cityid',$cityid)->pluck('id');
    	//dd($act_id);
    	//循环活动id，去查询每个活动的票数，自加，此时统计的是所有状态的作品，如有不同状态的统计，可以根据status统计
    	$works_count = null;
    	foreach ($act_id as $key => $v) {
    		$works_count += \DB::table('works')->where('actid',$v)->count('id');
    	}
    	
    	//dd($works_count);

    	//4.每个作品投票数的和
    	//属于本地区的活动id 指定字段查询
    	//dd($cityid);
    	$act_id=\DB::table('act')->where('cityid',$cityid)->pluck('id');
    	//dd($act_id);
    	//循环活动id，去查询每个活动的票数，自加，此时统计的是所有状态的作品，如有不同状态的统计，可以根据status统计
    	$tickets_count = null;
    	foreach ($act_id as $key => $v) {
    		$tickets_count += \DB::table('works')->where('actid',$v)->sum('tickets');
    	}
    	
    	//dd($works_count);

    	//dd($tickets_count);
        $adminuser=\Session::get('adminuser');

        return view("admin.index",compact('adminuser','act_count','act_browse','works_count','tickets_count'));
    }
    }

   



}
