/**
 * 判断手机号码格式
 */
$('#phone').blur(function () {
    checkTel($(this), $('#telErrorMessage'));
});
/**
 * 检测验证码位数
 */
$('#telCode').blur(function () {
    checkVerifyCode($(this), $('#telCodeErrorMessage'), 6);
});

/**
 * 发送手机验证码
 * @author zhangyuchao
 */
function sendMobileCode() {
    //alert("ok");
    var result = checkTel($('#phone'), $('#telErrorMessage'));
    if (result != 100) {
        return false;
    }
    //alert(result);
    time($('.dyMobileButton'));
    sendAjax({'tel': $('#phone').val(), '_token': token}, telVerifyCodeUrl, function (data) {
        //alert(response);
        if (response.ServerNo == 200) {
            $('#message').html('验证码已发送');
        } else {
            $('#message').html(response.ResultData);
        }
    })
}
/**
 * 使用手机号码注册
 */
function submitParamForTel() {
    if ($('.telAgree').prop('checked') != true) {
        $('#message').html('请先勾选协议')
        return false;
    }
    $('#message').html('')
    // 判断
    var telResult = checkTel($('#phone'), $('#telErrorMessage'))
    var codeResult = checkVerifyCode($('#telCode'), $('#telCodeErrorMessage'), 6);
    if (telResult != 100 && codeResult != 100) {
        return false;
    }
    layer.load(2);
    var data = {
        'tel': $('#phone').val(),
        'code': $('#telCode').val(),
        'registerType': 1,
        '_token': token,
    };

    sendAjax(data, registerUrl, function (response) {
        layer.closeAll();
        if (response.ServerNo == 200) {
            window.location.href = '/Merchant/register/index';
        } else {
            $('#message').html(response.ResultData);
        }
    })

}
/**
 * 点击注册
 */
function submitParamForEmail() {

    if ($('.emailAgree').prop('checked') != true) {
        $('#message').html('请先勾选协议')
        return false;
    }
    $('#message').html('')
    // 判断
    var codeResult = checkVerifyCode($('#emailCode'), $('#emailCodeErrorMessage'), 6);
    if(codeResult){
        return false;
    }

    layer.load(2);
    var data = {
        'code': $('#emailCode').val(),
        'registerType': 2,
        '_token': $('#token').val(),
    };
    sendAjax(data, registerUrl, function (response) {
        layer.closeAll();
        if (response.ServerNo == 200) {
            window.location.href = '/merchant/register/register';
        } else {
            $('#message').html(response.ResultData);
        }
    })

}
