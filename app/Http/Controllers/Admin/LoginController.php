<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use iscms\Alisms\SendsmsPusher as Sms;
class LoginController extends Controller
{
    public function __construct(Sms $sms)
    {
        $this->sms=$sms;
    }

    //加载登录模板
	public function index()
	{
		
		return view("admin.login");
	}

	//加载验证码
	public function getCode()
	{
		$builder = new CaptchaBuilder();
		$builder->build(150,32);
		\Session::put('phrase',$builder->getPhrase());//存储验证码
		return response($builder->output())->header("Content-type",'image/jpeg');
	}

	//执行登录验证
	public function doLogin(Request $request)
	{
		//执行验证码判断
		$mycode = $request->input("mycode");
		$yanzhengma = $request->session()->get('phrase');
		if($mycode !==$yanzhengma){
			return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
		}

		//执行登录判断
				
		$name =$request->input("name");
		$password = $request->input("password");
			//判断是否是超级用户
			$db=\DB::table("admin_root")->get()->first();
                //如果名字跟密码都对
			if($name==$db->name & $password==$db->password){
				//更新登录时间
                $db->logtime=date("Y-m-d H:i:s",time());
			    //更新表中登录时间字段
                \DB::table("admin_root")->where("id",1)->update(['logtime'=>$db->logtime]);
			    \Session::put("adminuser",$db);

				return redirect("admin");
			}
		//获取对应普通用户信息
		$user =\DB::table("admin_user")->where("name",$name)->first();
		if(!empty($user)){
			//判断密码
//			if(md5($password)==$user->password){
			if(HASH::check($password,$user->password)){
                //更新登录时间
                $user->log_time=date("Y-m-d H:i:s",time());
                //更新表字段中的admin_user字段
                \DB::table('admin_user')->where("id",$user->id)->update(["logtime"=>$user->log_time]);
			    //存储session跳转页面
				\Session::put("adminuser",$user);
				return redirect("admin");
			}
			}
				return back()->with("msg","账号或密码错误！");	
		}

    //发送验证码
    public function verify (Request $request,$pho)
    {
       // print_r($pho);die;
           //$ams= new App\Org\SmsAuth\AmsAuth;
      //return $ams->smsAuth("登录验证",$phone);
        $phone = $pho;// 用户手机号，接收验证码
        $name = '兄弟连';  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码
        $smsParams = [
            'number' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_75835101";   // 阿里大于(鱼)短信模板ID
        //$request ->session()->put('alidayu',$num);  // 存入session 后面做数据验证
        $result=$this->sms->send($phone,$name,$content,$code);
        //dd('aa');
        echo "<pre>";
        //var_dump($result);die;
        echo "验证码：".session('alidayu').'<br/>';
        if(property_exists($request,'result')){
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            return json_encode(['ResultData' => '成功', 'info' => '已发送']);
        }else{
            return json_encode(['ResultData' => '失败', 'info' => '重复发送']);
        }
    }

    //执行手机登录验证
    public function plogin(Request $request)
    {

        $code=$request->input('code');
        //var_dump($code);
        //若验证码输入错误
        if($code==NULL || $code!=$request->session()->get('alidayu'))
        {

            return back()->with("err","验证码输入错误");
        }
            //验证成功,获取登陆者信息
            $info=\DB::table('admin_user')->where('phone',$request->input('phone'))->first();
            //若$info为true
            if($info)
            {
                //将用户信息放入session中
                $request->session()->put('adminuser',$info);
               // return redirect("admin");
            } else {
                return back()->with("err","手机号码有误，请核对后再输入");
            }
        }




	//执行退出
	public function loginOut(Request $request)
	{
        $request->session()->forget('adminuser');
        return redirect("admin");
	}


}