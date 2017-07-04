<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Login_user;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{
    //加载登录模板
   public function index()
   {
       return view("home.login");
   }
   
   //执行用户登录
   public function doLogin(Request $request)
   {
        //获取信息框内数据进行筛选分类
        $info=$request->input('info');
        $pass=md5($request->input('password'));
        $rule1='/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/';
        $rule2='/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
        $rule3='/[a-zA-Z0-9_]{3,16}/'; 
        if(preg_match($rule1,$info)){
          $m=Login_user::where('phone',$info)->first();
          if($m){
            $upass=$m->pass();
            if($pass!==$upass){
                return back()->with("msg","密码错误!");
                }else{
                    \Session->put('user',$m);
                    return redirect("shoplist");
                }
            }else{
                return back()->with("msg","手机号码不存在!");
            }
        }
        if(preg_match($rule2,$info)){
          $n=Login_user::where('email',$info)->first();
          if($n){
            $upass=$n->pass();
            if($pass!==$upass){
               return back()->with("msg","密码错误!");
                }else{
                    \Session->put('user',$n);
                    return redirect("shoplist");
                }
            }else{
                return back()->with("msg","邮箱不存在!");
            }
        }
        if(preg_match($rule3,$info)){
          $o=Login_user::where('username',$info)->first();
          if($o){
            $upass=$o->pass();
            if($pass!==$upass){
                return back()->with("msg","密码错误!");
                }else{
                    \Session->put('user',$o);
                    return redirect("shoplist");
                }
            }else{
                return back()->with("msg","用户名不存在!");
            }
        }
        
        //根据分类在数据库中进行比对
        //若存在，进行密码比对；成功跳转，失败返回
        //若不存在，提示身份信息不存在
   }
   
   //加载验证码
   public function getCode()
   {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
   }
   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('user');
       return redirect("login");
   }

}
