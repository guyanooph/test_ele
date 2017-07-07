<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="<?php echo e(asset('js/jquery-3.2.1.js')); ?>"></script>
</head>
<body>
    <form method="post" action="<?php echo e(URL('code')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="tel"  onblur="sendMobileCode()"/>输入手机号码
        <input type="text" name="code" >请输入验证码
        <input type="submit" value="下一步">
        <div id="div_tel"></div>
    </form>
    <script>
        function sendMobileCode()
        {
            var tel = $("input[name='tel']").val();
            //alert(tel);
            $.ajax({
                url:'/sendMobileCode',
                type:"get",
                data:'tel='+tel,
                dataType:'text',
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success:function(data){
                    alert('a');
                },
                error:function(){
                    alert('b');
                }
            })
        }
    </script>
</body>
</html>