<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>吃了吗？手机注册</title>
    <script src="<?php echo e(asset('js/jquery-3.2.1.js')); ?>"></script>
</head>
<body>
<center>
    <h3>吃了吗？手机注册验证</h3>
<div>
    <form method="post">
        <div class="am-tab-panel">
            <form method="post" >
                <?php echo e(csrf_field()); ?>

                <div class="user-phone">
                    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                    <input type="tel" name="tel" id="phone" placeholder="请输入手机号" minlength="2">
                </div>
                <div id="telErrorMessage" style="color:red;font-size:12px;margin:2px 30px"></div>
                <div class="verification">
                    <label for="code"><i class="am-icon-code-fork"></i></label>
                    <input type="text" name="code" id="telCode" style="width:80px" placeholder="请输入验证码" >
                    <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();"
                       id="sendMobileCode">
                        <button type="button" style="width:100px" id="dyMobileButton" class="dyMobileButton" style="width:40%">获取验证码</button></a>
                </div>
                <div id="relTelRelPwdErrorMessage"
                     style="color:red;font-size:12px;margin:2px 30px"></div>
            </form>
            <div class="login-links" style="margin:10px auto">
                <label for="reader-me">
                    <input id="reader-me" type="checkbox" class="telAgree"> 点击表示您同意商城《服务协议》
                </label>
            </div>

            <div class="am-cf" style="margin:10px auto">
                <input type="submit" name="" value="下一步" class="am-btn am-btn-primary am-btn-sm am-fl"
                       onclick="submitParamForTel(1)">
            </div>
        </div>
    </form>
</div>
<script src="<?php echo e(asset('handle/member/validate.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('handle/sendAjax.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('handle/function.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('handle/register.js')); ?>" type="text/javascript"></script>
<script>
    // 获取手机验证码路由
    var telVerifyCodeUrl = "<?php echo e(url('merchant/register/sendMobileCode')); ?>";
    // 注册路由
    var registerUrl = "<?php echo e(url('merchant/addRegister')); ?>";
    var token= "<?php echo e(csrf_token()); ?>";
    var wait = 60;
</script>
</center>
</body>
</html>