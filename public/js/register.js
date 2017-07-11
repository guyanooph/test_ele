var mername = false;
var pass = false;
var repass = false;
var phone =false;
var title = false;
var iden = false;

    function doSubmit(){
        //alert(mername);
        //alert(pass);
        //alert(repass);
        //alert(phone);
        //alert(title);
        //alert(iden);
        return checkMername() && checkPass() && checkRepass() && checkPhone() && checkShoptitle() && checkIdentity ;
        //return checkMername() && false;
        //return mername && pass && repass && phone && title && iden;
        //return true;



    }

        //验证用户名
        function checkMername(){
        	

            var mername = $("input[name='mername']").val();
            //alert('ok');
            $("input[name='mername']").nextAll('span').remove();
            //alert(mername);
            if (mername.match(/^\w{6,18}$/) == null) {

                $('#div_mername').empty();

                $('#div_mername').append('<span>请输入正确的账户名，6～18字母数字下划线</span>');
                return false;
                //alert('ok');
            } else {
                //$("#div_mername").empty();
                //$("input[name = 'mername']").nextAll('span').remove();
                $.ajax({
                    url: 'merchant/ver',
                    type:"post",
                    data:'mername='+mername,
                    dataType:'text',
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success:function(data){
                        //alert(data);
                        if(data ==1){
                            $("<span>已经被使用</span>").insertAfter("input[name='mername']");
                            // document.storeForm.mername.value = "";//只return false拦不住，把这个值变成空，上面的判断拦住它
                            return false;
                        }else{
                            $("<span>该账户未被注册，可用</span>").insertAfter("input[name='mername']");
                            mername = true;
                            //alert(mername);
                        }
                    }
                })
            }
            mername = true;
        }

        //验证密码
        function checkPass(){
                //alert('ok');
                if (($('input[name =\'password\']').val()).match(/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/) == null) {

                    $('#div_password').empty();

                    $('#div_password').append('<span>请输入正确的密码，8到16位数字与字母组合</span>');
                    return false;
                    //alert('ok');
                } else {
                    $('#div_password').empty()
                    $('#div_password').append('<span>可用</span>')
                    //$("#div_mername").empty();
                }
            pass = true;
        }

        //密码确认
        function checkRepass(){
            if (($('input[name =\'password\']').val()) == $('input[name = \'repassword\']').val()) {


                $('#div_repassword').empty();

                $('#div_repassword').append('<span>密码一致，可用</span>');
                //alert('ok');
            } else {
                $('#div_repassword').empty();
                $('#div_repassword').append('<span>两次输入密码不同或格式错误，不可用</span>');
                return false;
                //$("#div_mername").empty();
            }
            repass = true;
        }

        //验证详细地址

        //验证店铺名称
        function checkShoptitle (){
            //alert('ok');
            var shoptitle = $("input[name='shoptitle']").val();
            if (($('input[name =\'shoptitle\']').val()).match(/^[\u4e00-\u9fa5]{1,19}$/) == null) {

                $('#div_shoptitle').empty()

                $('#div_shoptitle').append('<span>店铺名必须为2～20个汉字</span>')
                return false;
                //alert('ok');
            } else {
//                $('#div_shoptitle').empty()
//                $('#div_shoptitle').append('<span>可用</span>')
                //$("#div_mername").empty();
                //alert('ok');
                $("#div_shoptitle").empty();
                $("input[name = 'shoptitle']").nextAll('span').remove();
                $.ajax({
                    url: 'merchant/ver_s',
                    type:"post",
                    data:'shoptitle='+shoptitle,
                    dataType:'text',
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success:function(data){
                        //alert(data);
                        if(data == 1){
                            $("<span>已经被使用</span>").insertAfter("input[name='shoptitle']");
                            //alert(data);
                            return false;
                        }else{
                            $("<span>该账户未被注册，可用</span>").insertAfter("input[name='shoptitle']");
                        }
                    }
                })
            }
            title = true;
        }

    //验证手机号码
        function checkPhone (){
            //alert('ok');
            var phone = $("input[name='phone']").val();
            if (($('input[name =\'phone\']').val()).match(/^(((1[0-9]{2}))+\d{8})$/) == null) {

                $('#div_phone').empty();

                $('#div_phone').append('<span>请输入正确格式的手机号码</span>');
                return false;
                //alert('ok');
            } else {
                //alert('ok');
                $("#div_phone").empty();
                $("input[name = 'phone']").nextAll('span').remove();
                $.ajax({
                    url: 'merchant/ver_p',
                    type:"post",
                    data:'phone='+phone,
                    dataType:'text',
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success:function(data){
                        //alert(data);
                        if(data == 1){

                            $("<span>该手机号码已经被使用</span>").insertAfter("input[name='phone']");
                            //alert(data);
                            return false;
                        }else{
                            $("<span>该手机号码可用</span>").insertAfter("input[name='phone']");
                            //alert(data);
                            phone = true;
                            //alert(phone);
                        }
                    }
                })
            }
            phone = true;
        }
        //验证身份证号码
        function checkIdentity (){
            //alert('ok');
            var identity = $("input[name='identity']").val();
            if (($('input[name =\'identity\']').val()).match(/^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/) == null ){

                $('#div_identity').empty()

                $('#div_identity').append('<span>请输入合法的身份证号码</span>')
                return false;
                //alert('ok');
            } else {
    //                $('#div_shoptitle').empty()
    //                $('#div_shoptitle').append('<span>可用</span>')
                //$("#div_mername").empty();
                //alert('ok');
                $("#div_identity").empty();
                $("input[name = 'identity']").nextAll('span').remove();
                $.ajax({
                    url: 'merchant/ver_i',
                    type:"post",
                    data:'identity='+identity,
                    dataType:'text',
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success:function(data){
                        //alert(data);
                        if(data ==1){
                            $("<span>该身份证号码已经被使用</span>").insertAfter("input[name='identity']");
                            //alert(data);
                            return false;
                        }else{
                            $("<span>该身份证号码可用</span>").insertAfter("input[name='identity']");
                        }
                    }
                })
            }
            iden = true;
        }

        function checkUsername(){
            if (($('input[name =\'username\']').val()).match(/^[\u4e00-\u9fa5]{2,5}$/) == null) {

                $('#div_username').empty()

                $('#div_username').append('<span>真实姓名必须为2～5位汉字</span>')
                //alert('ok');
            } else {
                $('#div_username').empty()
                $('#div_username').append('<span>可用</span>')
                //$("#div_mername").empty();
            }
            return true;
        }

        //第一个图片显示
    function preview(file)
    {
        var prevDiv = document.getElementById('preview');
        if (file.files && file.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }

    //第二个图片显示

    function preview1(file)
    {
        var prevDiv = document.getElementById('preview1');
        if (file.files && file.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }


    //加载商家分类
    $(function(){
        $("#mid").change(function(){
            var midValue = $(this).val();
            myLoad(midValue);
            //alert(midValue);
        });
    });
        function myLoad(id){
            $("#sid option").remove();
            //alert(id);
            $.ajax({
                url:'sid/'+id,
                //url:'sid/',
                //type:'get',
                //data:'id='+id,
                dataType:"json",
                success:function(data) {
                    for(var sid in data){
                        //alert(sid);
                        var s = "<option value='"+data[sid].id+"'>"+data[sid].title+"</option>";
                        //alert(s);
                        $("#sid").append(s);
                    }
                },
                 error:function(){
                     alert('error');
                 }
            });
        }