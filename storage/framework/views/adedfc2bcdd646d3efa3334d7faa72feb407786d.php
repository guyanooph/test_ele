<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
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
                  <h3 class="box-title"><i class="fa fa-th"></i> 操作订单信息管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>订单号</th>
                      <th>商品数量</th>
					  <th>创建时间</th>
                      <th>收货人</th>
					  <th>收货地址</th>
                      <th>收货电话</th>
					  <th>金额</th>
					  <th>订单状态</th>
					  <th>订单描述</th>
					  <th>支付方式</th>
					  <th>配送方式</th>
					  <th>发票信息</th>
					  <th>备注</th>
                      <th style="width: 50px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>>
							<td><?php echo e($order->goods_num); ?></td>
							<td><?php echo e($order->create_time); ?></td>
                            <td><?php echo e($order->addressid->name); ?></td>
                            <td><?php echo e($order->addressid->address); ?></td>
                            <td><?php echo e($order->addressid->phone); ?></td>
							<td><?php echo e($order->amount); ?></td>
							
                            <td><?php echo e(['未支付','未发货','发货','已收货','已评论','已取消'][$order->status]); ?></td>
							<td><?php echo e($order->order_description); ?></td>
							<td><?php echo e(['支付宝','微信支付'][$order->pay]); ?></td>
							<td><?php echo e(['自送','蜂鸟快递'][$order->distribution]); ?></td>
							<td><?php echo e($order->invoice_info); ?></td>
							<td><?php echo e($order->remark); ?></td>
                            <td>
                               <button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/order/edit')); ?>/<?php echo e($order->id); ?>'">编辑</button>
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