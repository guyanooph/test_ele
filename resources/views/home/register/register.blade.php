<html>
<!-- <script src="js/jquery-3.2.1.min.js"></script> -->
<form method="POST" action="{{URL('doregister')}}">
  {{ csrf_field() }} 

    <div>
        phone
        <input type="phone" name="phone" id='phone' value="">
    </div>

    <div class="verification">
    <label for="code"><i class="am-icon-code-fork"></i></label>
        <input type="text" name="num" id="phoneNum" placeholder="请输入验证码"> <br/>
 <br/>
 <br/>

        <a class="btn" href="javascript:void(0);" style="text-decoration:none">
            <button type="button" id="btnSendCode" onclick="sendMessage();">获取验证码</button>
        </a>
        <br/> <br/>
 <br/>
 <br/>
 <br/>

        <span id='jbPhoneTip'></span>
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
document.getElementById("btnSendCode").innerHTML="请在" + curCount + "s后再次获取";//更改按钮文字
InterValObj = window.setInterval(SetRemainTime, 1000); // 启动计时器timer处理函数，1秒执行一次
// 向后台发送处理数据
$.ajax({
url: "{{URL('register/sendmessage')}}", // 目标地址
type: "GET", // 用POST方式传输
dataType: "json", // 数据格式:JSON
data:'phone='+$('#phone').val(),
//data: $('form').serialize,
success: function (data){
$("#jbPhoneTip").html("<font color='#339933'>"+data.ResultData+','+data.info+"</font>");
},
error:function(){
$("#jbPhoneTip").html("<font color='#339933'>"+data.ResultData+','+data.info+"</font>");
}
});
}

//timer处理函数

function SetRemainTime() {
if (curCount == 0) {                
window.clearInterval(InterValObj);// 停止计时器
document.getElementById("btnSendCode").removeAttribute("disabled");//移除禁用状态改为可用
document.getElementById("btnSendCode").innerHTML="重新发送验证码";
}else {
curCount--;
document.getElementById("btnSendCode").innerHTML="请在" + curCount + "秒后再次获取";
}
}

 

</script>
</html>