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
<<<<<<< HEAD
			<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
=======
			
>>>>>>> bf4a651f0a50a8c731e0d23b72e5a3014808da00
			<div class="row">
            <div style="font-size:18px;" class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 营业信息管理</h3>
<<<<<<< HEAD
				  <button style="font-size:15px;margin-left:50px;" class="btn btn-primary" onclick="window.location='<?php echo e(URL('/merchant/merchant/edit')); ?>/<?php echo e($merchant->id); ?>'">编 辑 商 家 信 息</button>
=======
				  <button style="font-size:15px;margin-left:50px;" class="btn btn-primary" onclick="window.location='<?php echo e(URL('/merchant/merchant/edit')); ?>/<?php echo e($merchant->shopid); ?>'">编 辑 商 家 信 息</button>
>>>>>>> bf4a651f0a50a8c731e0d23b72e5a3014808da00
                  <div class="box-tools">
                   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">

				
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">商家名字：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->shopname); ?>

						</div>
						</div>
					</div> 
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">服务评分：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->rate); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">logo：</label>
						</div>
						<div id="preview" class=
<<<<<<< HEAD
						"col-sm-2 control-label"><img src='http://osltbib18.bkt.clouddn.com/wang/image_<?php echo e($merchant->logo); ?>'/></div>
=======
						"col-sm-2 control-label"><img src='http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($merchant->logo); ?>'/></div>
>>>>>>> bf4a651f0a50a8c731e0d23b72e5a3014808da00
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">地址：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->address); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">商家电话：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->phone); ?>

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">商家介绍：</label>
						<div class="col-sm-4">
<<<<<<< HEAD
							<?php echo e($merchant->descr); ?>
=======
							<?php echo e($merchant->desc); ?>
>>>>>>> bf4a651f0a50a8c731e0d23b72e5a3014808da00

						</div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">商家承诺：</label>
						<div class="col-sm-4">
							<?php echo e($merchant->commit); ?>

						</div>
						</div>
					</div>
<<<<<<< HEAD
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
=======
                   
>>>>>>> bf4a651f0a50a8c731e0d23b72e5a3014808da00
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