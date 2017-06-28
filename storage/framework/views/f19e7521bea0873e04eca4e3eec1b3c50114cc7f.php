    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改管理员信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(url('admin/user')); ?>" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <<input type="hidden" name="id" value="<?php echo e($v->id); ?>">  
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">姓名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3"  value="<?php echo e($v->name); ?>">
                      </div>
                    </div>
                   
				      	<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
                      <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password" value="<?php echo e($v->password); ?>">
                      </div>
                    </div>
				 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">添加</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>