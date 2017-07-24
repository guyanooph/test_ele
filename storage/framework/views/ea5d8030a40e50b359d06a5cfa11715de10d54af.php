<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				<i class="fa fa-calendar"></i>
				订单信息管理
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
				<li><a href="#">信息管理</a></li>
				<li class="active">添加信息</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<!-- right column -->
				<div class="col-md-12">
				<!-- Horizontal Form -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" action="<?php echo e(URL('merchant/order/update')); ?>/<?php echo e($order->id); ?>" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单号</label>
								<div class="col-sm-4">
									<input type="text" name="id" readonly class="form-control" placeholder="订单号" value="<?php echo e($order->id); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">当前状态</label>
								<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio1" <?php echo e($order->status); ?> value="1"> 未发货
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" <?php echo e($order->status); ?> value="2"> 正在配送
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" <?php echo e($order->status); ?> value="3"> 已收货
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" <?php echo e($order->status); ?> value="4"> 已评论
								</label>

								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" readonly class="col-sm-2 control-label">备注</label>
								<div class="col-sm-4">
									<input type="text" name="remark" class="form-control" placeholder="备注" value="<?php echo e($order->remark); ?>">
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