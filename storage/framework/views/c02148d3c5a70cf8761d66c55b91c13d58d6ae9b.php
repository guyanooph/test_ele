<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>会员登陆</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo e(asset('myadmin/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo e(asset('myadmin/bootstrap/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="<?php echo e(asset('myadmin/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo e(asset('myadmin/plugins/iCheck/square/blue.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php echo e(asset('myadmin/bootstrap/js/html5shiv.min.js')); ?>"></script>
        <script src="<?php echo e(asset('myadmin/bootstrap/js/respond.min.js')); ?>"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="sid" action="<?php echo e(URL('ad/plogin')); ?>" method="post">

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
                  url:"<?php echo e(url('admin/login/verify')); ?>/"+pho,
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

        <?php if(session("msg")): ?>
            <p class="login-box-msg" style="color:red;"><?php echo e(session("msg")); ?></p>
        <?php else: ?>
            <p class="login-box-msg"></p>
        <?php endif; ?>

      <!--    <?php if(session("phrase")): ?>
            <p class="login-box-msg" style="color:red;"><?php echo e(session("phrase")); ?></p>
        <?php else: ?>
            <p class="login-box-msg">没有</p>
        <?php endif; ?> -->
        <p><image style="margin-left:50px;padding:10px;" src="<?php echo e(asset('images/u5.png')); ?>"></p>
        <form action="<?php echo e(url('ad/dologin')); ?>" method="post" id="nform">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="form-group has-feedback">
           <input type="text" class="form-control" name="name" placeholder="账号"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
           <input type="password" name="password" class="form-control" placeholder="密码"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-6"> 
              <div class="form-group has-feedback" style="width:140px;">
                <input type="text" name="mycode" class="form-control" placeholder="验证码"/>
                <span class="glyphicon glyphicon-th form-control-feedback"></span>
              </div>
          </div>
          <div class="col-xs-6">
              <img src="<?php echo e(url('ad/getcode')); ?>" onclick="this.src='<?php echo e(url('ad/getcode')); ?>?id='+Math.random(); " width="100" height="34"/>
          </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登 陆</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo e(asset('myadmin/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>  
    <!-- iCheck -->
    <script src="<?php echo e(asset('myadmin/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')); ?>" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      <?php if(session("err")): ?>
      <script type="text/javascript">
          alert(session('err');
    </script>
    <?php endif; ?>


    </script>
  </body>
  </html>