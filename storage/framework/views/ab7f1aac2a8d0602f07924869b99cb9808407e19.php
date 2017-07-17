<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			商家评价回复管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">浏览种类</a></li>
            <li class="active">编辑信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i>回复用户评价</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(URL('merchant/evaluate/update')); ?>/<?php echo e($list->id); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="_method" value="put">
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">店铺名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="shopid" readonly class="form-control" value="<?php echo e($list->shopid); ?>">
                      </div>
                    </div>
				  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="userid" readonly class="form-control" value="<?php echo e($list->userid); ?>">
                      </div>
                    </div>
				  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">订单号：</label>
                      <div class="col-sm-4">
                        <input type="text" name="orderid" readonly class="form-control" value="<?php echo e($list->orderid); ?>">
                      </div>
                    </div>
				  </div>
				   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">评价内容：</label>
                      <div class="col-sm-4">
                        <input type="text" name="content" readonly class="form-control" value="<?php echo e($list->content); ?>">
                      </div>
                    </div>
				  </div>
				   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">用户对店铺评分数：</label>
                      <div class="col-sm-4">
                        <input type="text" name="shopg_rate" readonly class="form-control" value="<?php echo e($list->shopg_rate); ?>">
                      </div>
                    </div>
				  </div>
				   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家对用户的回复：</label>
                      <div class="col-sm-4">
                        <input type="number" name="shop_content" class="form-control" value="<?php echo e($list->shop_content); ?>">
                      </div>
                    </div>
				  </div>
				  <!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
				<div class="row"><div class="col-sm-12">
                <br/>
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                </div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>