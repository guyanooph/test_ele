    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            商家信息表
            <small>请填写完整，有利于买家查看</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商家信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
            <div style="font-size:18px;" class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 营业信息管理</h3>
				  <button style="font-size:15px;margin-left:50px;" class="btn btn-primary" onclick="window.location='<?php echo e(URL('/merchant/merchantopen/edit')); ?>/<?php echo e($merchant->id); ?>'">编 辑 商 家 营 业 信 息</button>
                  <div class="box-tools">
                   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">

				
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">营业时间：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->opentime); ?>

						</div>
						</div>
					</div> 
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">结束时间：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->closetime); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">起送价：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->givemoney); ?>

						</div>
						</div>
						
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">配送费：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->money); ?>

						</div>
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">配送方式：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->method); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">平均配送：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->service_time); ?> 分钟
						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">月销量：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->month_num); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">总销量：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->time); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">状态：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->state); ?>

						</div>
						</div>
					</div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!-- /.box-body -->
				</div><!-- /.box -->
				
            </div><!-- /.col onclick="/merchant/<?php echo e($merchant->id); ?>/edit"-->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="<?php echo e(url('merchant/merchant')); ?>" style="display:none;" id="mydeleteform" name="myform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="delete">
        </form>
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection("myscript"); ?>
      <script type="text/javascript">
            function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "<?php echo e(URL('merchant/merchant/destroy')); ?>/"+id;
                    form.submit(); 
                }
              });
        }
      </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>