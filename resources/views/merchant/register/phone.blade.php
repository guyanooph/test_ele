<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
</head>
<body>
    <center>
        <h3>吃货，商家注册</h3>
    <form method="post" action="{{ URL('code') }}">
        {{ csrf_field() }}
        <input type="text" name="tel" value="请输入手机号码"/>  &nbsp; <button onclick="sendMobileCode()">点击发送验证码</button><br/>
        <input type="text" name="code" value="请输入验证码">
        <input type="submit" value="点击进行下一步">
        <div id="div_tel"></div>
    </form>
    </center>
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