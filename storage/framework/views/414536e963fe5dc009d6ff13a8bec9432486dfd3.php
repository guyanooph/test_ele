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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 地方管理员添加活动</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form action="<?php echo e(url('admin/act')); ?>" method="post" class="form-horizontal"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="cityid" value="<?php echo e($cityid); ?>">
                   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动名称：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="活动名称">
                      </div>
                    </div>
                   

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动图片：</label>
                      <div class="col-sm-4">
                        <input type="file" name="picname" class="form-control" id="inputEmail3" placeholder="活动图片">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">宣传视频：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="3" placeholder="请输入宣传视频地址" name="viedo"></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动介绍：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入200字以内的活动介绍" name="introduce"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动规则：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入活动规则" name="rule"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">奖品设置：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入活动规则" name="prize"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动时间：</label>
                      <div class="col-sm-4">
                        <input type="text" name="start_time" class="form-control" id="inputEmail3" placeholder="开始时间">
                        <input type="text" name="end_time" class="form-control" id="inputEmail3" placeholder="结束时间">
                      </div>
                    </div>
 
                   <!-- /.box-body -->
                  <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-1">
            <button type="submit" class="btn btn-primary">添加</button>
                    </div>
          <div class="col-sm-1">
            <button type="reset" class="btn btn-primary">重置</button>
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