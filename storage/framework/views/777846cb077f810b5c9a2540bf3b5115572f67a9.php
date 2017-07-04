    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">普通管理员信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 会员基本信息</h3>&nbsp;&nbsp;	
                  <div class="box-tools">
                    <form action="<?php echo e(url('admin/stu')); ?>" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="会员账号"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>用户ID</th>
                      <th>用户名</th>
                      <th>邮箱</th>
                      <th>手机</th>
                      <th>状态</th>
                      <th>登陆ip</th>
                      <th>登录时间</th>
                      <th>操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->userid); ?></td>
                      <td><?php echo e($v->username); ?></td>
                      <td><?php echo e($v->email); ?></td>
                      <td><?php echo e($v->phone); ?></td>
                      <td><?php if($v->status==0): ?> 黑名单 <?php else: ?> 正常 <?php endif; ?> </td>
                      <td><?php echo e($v->last_ip); ?></td>
                      <td><?php echo e($v->last_login_time); ?></td>
                      <td>
                      <button onclick="window.location='<?php echo e(URL('admin/user/edit')); ?>/<?php echo e($v->id); ?>'"class="btn btn-xs btn-primary">编辑</button><button onclick="window.location='<?php echo e(URL('admin/user/detail')); ?>/<?php echo e($v->id); ?>'"class="btn btn-xs btn-primary">详情</button> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 <?php echo e($list->links()); ?>

                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>