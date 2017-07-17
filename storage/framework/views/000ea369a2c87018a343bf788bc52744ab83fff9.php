<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/merchant"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
				<?php if(session('msg')): ?>
				<p style="color:red"><?php echo e(session('msg')); ?></p>
				<?php else: ?>
				<?php endif; ?>	
                  <h3 class="box-title"><i class="fa fa-th"></i> 用户评价浏览</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>ID</th>
                      <th>商家id</th>
                      <th>用户id</th>
                      <th>订单id</th>
					  <th>是否匿名</th>
					  <th>评论内容</th>
					  <th>评星</th>
					  <th>回复内容</th>
					  <th>订单送达时间</th>
					  <th>是否可见</th>
					  <th>评论创建时间</th>
                      <th style="width: 50px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $eva; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
						    <td><?php echo e($list->id); ?></td>
						    <td><?php echo e($list->shopid); ?></td>
                            <td><?php echo e($list->userid); ?></td>
                            <td><?php echo e($list->orderid); ?></td>
							<td><?php echo e($list->anonymous); ?></td>
							<td><?php echo e($list->content); ?></td>
							<td><?php echo e($list->shopg_rate); ?></td>
							<td><?php echo e($list->shop_content); ?></td>
							<td><?php echo e($list->service_time); ?></td>
							<td><?php echo e($list->status); ?></td>
							<td><?php echo e($list->create_time); ?></td>
                            <td>
                               <button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/evaluate/edit/')); ?>/<?php echo e($list->id); ?>'">编辑</button> 
                            </td>							   
							</tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('myscript'); ?>
    <form action="<?php echo e(URL('merchant/order')); ?>" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "<?php echo e(URL('merchant/order/destroy')); ?>/"+id;
                    form.submit(); 
                }
              });
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>