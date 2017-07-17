<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>会员登陆</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="{{asset('myadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('myadmin/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{asset('myadmin/bootstrap/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('myadmin/bootstrap/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>管理员登陆页</b></a>

      </div><!-- /.login-logo -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">手机登录</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">手机登录</h4>
            </div>
            <div class="modal-body">
              <form id="sid" action="{{URL('ad/plogin')}}" method="post">

                <input  type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
                <div class="form-group">
                  <label for="recipient-name" class="control-label">手机号:</label>
                  <input type="tel" name="tel" class="form-control" id="phone" placeholder="请输入手机号" >
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">验证码:</label>
                  <input type="text" name="code" class="form-control" id="telCode" placeholder="请输入验证码">
                    <a  id="codeq" onclick="aa()" style="width:40%">获取验证码</a>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-primary">登录</button>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
      <script>
          var a=0;
          var mytime=null;
          function aa(){
              var pho=$("#phone").val();
              //ajax发送传递手机号码
              $.ajax({
                  url:"{{url('admin/login/verify')}}/"+pho,
                  type:'get',
                  dataType:"html",
                  async:true,
                  success:function(data){
                      $(".login-logo").append("<li>"+data['ResultData']+"</li>");
                  },
              });
              if(mytime==null){
                  a=6;
                  djs();
              }
          }
          //倒计时
          function djs(){
              //alert("dd");
              a--;
              $("#codeq").html(a+"秒后重新发送验证码");
              if(a<0){
                  $("#codeq").html("获取验证码");
                  mytime=null;
                  return
              }
              mytime=setTimeout(djs,1000);
          }
      </script>


      <div class="login-box-body">

        @if(session("msg"))
            <p class="login-box-msg" style="color:red;">{{session("msg")}}</p>
        @else
            <p class="login-box-msg">Sign in to start your session</p>
        @endif

         @if(session("phrase"))
            <p class="login-box-msg" style="color:red;">{{session("phrase")}}</p>
        @else
            <p class="login-box-msg">没有</p>
        @endif
        <form action="{{url('ad/dologin')}}" method="post" id="nform">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="form-group has-feedback">
           账号： <input type="text" class="form-control" name="name" placeholder="name"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
           密码： <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-6"> 
              <div class="form-group has-feedback" style="width:140px;">
                <input type="text" name="mycode" class="form-control" placeholder="code"/>
                <span class="glyphicon glyphicon-th form-control-feedback"></span>
              </div>
          </div>
          <div class="col-xs-6">
              <img src="{{url('ad/getcode')}}" onclick="this.src='{{url('ad/getcode')}}?id='+Math.random(); " width="100" height="34"/>
          </div>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登 陆</button>
            </div><!-- /.col -->
          </div>
        </form>


        <a href="#" style="font-size:12px;">忘记密码</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="register.html" class="text-center" style="font-size:12px;">注册会员</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('myadmin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>  
    <!-- iCheck -->
    <script src="{{asset('myadmin/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      @if(session("err"))
      <script type="text/javascript">
          alert(session('err');
    </script>
    @endif


    </script>
  </body>
  </html>