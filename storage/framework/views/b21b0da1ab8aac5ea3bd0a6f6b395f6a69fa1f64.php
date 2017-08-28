        <?php $__env->startSection('content'); ?>

          <?php if(session("msg")): ?>
            <p class="login-box-msg" style="color:red;"><?php echo e(session("msg")); ?></p >
          <?php else: ?>
            <p class="login-box-msg"></p >
          <?php endif; ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            活动数据统计
            <small>信息概览</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo e($act_count); ?></h3>
                  <p>活动总数</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
               <!--  <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo e($act_browse); ?><sup style="font-size: 20px"></sup></h3>
                  <p>活动浏览总数</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
               <!--  <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo e($works_count); ?></h3>
                  <p>作品总数</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo e($tickets_count); ?></h3>
                  <p>投票总数</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
          
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>