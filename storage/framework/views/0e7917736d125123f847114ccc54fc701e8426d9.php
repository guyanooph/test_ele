<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商家注册</title>
    <script src="<?php echo e(asset('js/jquery-3.2.1.js')); ?>"></script>
    <style type="text/css">
        body{
            /*background:url('../images/sjzc.jpeg');*/
            background-color: #39B1FF;
        }
        input{
            font-size: x-small;
        }
    </style>
</head>
<body>
<div id="box">
<center>
    <h3>吃货，商家注册</h3>
    <form method="post" action="<?php echo e(URL('code')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="tel"  placeholder="请输入手机号码"/>
        <input type="button" onclick="sendMobileCode()" value="点击发送验证码"><br/>
        <input type="text" name="code" placeholder="请输入验证码">
        <input type="submit" value="点击进行下一步">
        <div id="div_tel"></div>
    </form>
</center>
</div>
<script>
    function sendMobileCode()
    {
        //alert('ok')
        var tel = $("input[name='tel']").val();
        //alert(tel);
        $.ajax({
            url:'/sendMobileCode',
            type:"get",
            data:'tel='+tel,
            dataType:'text',
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            success:function(data){
                //alert('a');
            },
            error:function(){
                //alert('b');
            }
        })
    }
</script>
</body>
</html>