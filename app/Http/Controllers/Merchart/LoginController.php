<?php
namespace App\Http\Controllers\Merchart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
   //加载登录模板
   public function login()
   {
       return view("merchart.login");
   }
   
   public function load_img($a, $b)
   {
	   header("Content-Type:image/jpeg");
	   $img_path = "D:/xampp/htdocs/Test/test_ele/public/myadmin/assets/img/".$a."/".$b;
	   $img = file_get_contents($img_path);
	   echo $img;
   }
   
   //执行用户登录
   public function doLogin(Request $request)
   {
        // //执行验证码判断
        // $mycode = $request->input("mycode");
        // $yanzhengma = $request->session()->get('phrase');
        // if($mycode !== $yanzhengma){
        //     return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
        // }
        
        //执行登陆判断
        $email = $request->input("email");
        $password = $request->input("password");
        //获取对应用户信息
        $user = \DB::table("users")->where("email",$email)->first();
        if(!empty($user)){
            //判断密码
            if(md5($password)==$user->password){
                //存储session跳转页面
                session()->set("adminuser",$user);
                
                //获取当前登陆者的权限
                $res = \DB::select('select n.name,n.method,n.url  from user_role ur,role_node rn,node n where ur.rid=rn.rid and rn.nid=n.id and ur.uid=:id', ['id' => $user->id]);
                $nodelist = array(array("name"=>"网站首页","method"=>"get","url"=>"merchart"));
                foreach($res as $ob){
                    $nodelist[] = [
                           "name"=>$ob->name,
                           "method"=>$ob->method,
                           "url"=>$ob->url
                        ];
                    //判断当前是否有添加权限,若有就追加执行添加
                    if(preg_match("/^.*?\/create$/",$ob->url) && $ob->method=="get"){
                        $nodelist[] =[
                           "name"=>"执行添加",
                           "method"=>"post",
                           "url"=>preg_replace("/^(.*?)\/create$/","\\1",$ob->url)
                        ];
                    }
                    //判断当前是否有修改权限,若有就追加执行修改
                    if(preg_match("/^.*?\/\*\/edit$/",$ob->url) && $ob->method=="get"){
                        $nodelist[] =[
                           "name"=>"执行修改",
                           "method"=>"put",
                           "url"=>preg_replace("/^(.*?)\/\*\/edit$/","\\1/*",$ob->url)
                        ];
                    }
                }
                //将获取的权限放入到session中
                session()->set("nodelist",$nodelist);
                
                return redirect("merchart");
               //echo "测试成功!";
            }
        }
        return back()->with("msg","账号或密码错误！");
       
   }
   
   // //加载验证码
   // public function getCode()
   // {
   //      $builder = new CaptchaBuilder();
   //      $builder->build(150,32);
   //      \Session::set('phrase',$builder->getPhrase()); //存储验证码
   //      return response($builder->output())->header('Content-type','image/jpeg');
   // }
   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('adminuser');
       return redirect("merchart/login");
   }
}
