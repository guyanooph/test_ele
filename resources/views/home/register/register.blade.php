<html>
<form method="POST" action="{{URL('doregister')}}">
  {{ csrf_field() }} 

    <div>
        phone
        <input type="phone" name="phone" value="">
    </div>

    <div class="verification">
    <label for="code"><i class="am-icon-code-fork"></i></label>
        <input type="text" name="code" id="emailCode" placeholder="请输入验证码">
        <a class="btn" href="javascript:void(0);">
            <button type="button" id="dyMobileButton" onclick="sendMessage();" id="sendMessage"
class="sendEmail dyEmailButton" style="width:40%" >获取验证码</button>
        </a>
        <span id='jbPhoneTip'></span>
    </div>
    <div>
        <input type="checkbox" name="remember"> 记住我
    </div>

    <div>
        <button type="submit">登录</button>
    </div>
</form>

<script type="text/javascript"> 


var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数
function sendMessage() {
curCount = count;
// 设置button效果，开始计时
document.getElementById("btnSendCode").setAttribute("disabled","true" );//设置按钮为禁用状态
document.getElementById("btnSendCode").value="请在" + curCount + "后再次获取";//更改按钮文字
InterValObj = window.setInterval(SetRemainTime, 1000); // 启动计时器timer处理函数，1秒执行一次
// 向后台发送处理数据
$.ajax({
type: "POST", // 用POST方式传输
dataType: "json", // 数据格式:JSON
url: "{{URL('register/sendMessage')}}", // 目标地址
data: $("form").serialize,
success: function (data){ 
/*data = parseInt(data, 10);
if(data == 1){
$("#jbPhoneTip").html("<font color='#339933'>√ 短信验证码已发到您的手机,请查收</font>");
                }else if(data == 0){
$("#jbPhoneTip").html("<font color='red'>× 短信验证码发送失败，请重新发送</font>");
}*/
alter('ok');
}
});
}

//timer处理函数

function SetRemainTime() {
if (curCount == 0) {                
window.clearInterval(InterValObj);// 停止计时器
document.getElementById("btnSendCode").removeAttribute("disabled");//移除禁用状态改为可用
document.getElementById("btnSendCode").value="重新发送验证码";
}else {
curCount--;
document.getElementById("btnSendCode").value="请在" + curCount + "秒后再次获取";
}
}

 

</script>
</html>