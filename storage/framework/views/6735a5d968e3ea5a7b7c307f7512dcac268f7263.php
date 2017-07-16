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
                      <th>商家名称</th>
                      <th>商家电话</th>
                      <th>商品数量</th>
					  <th>创建时间</th>
					  <th>收货地址</th>
					  <th>金额</th>
					  <th>订单状态</th>
					  <th>订单描述</th>
					  <th>结束时间</th>
					  <th>配送费</th>
					  <th>餐盒费</th>
					  <th>送达时间</th>
					  <th>支付方式</th>
					  <th>配送方式</th>
					  <th>发票信息</th>
					  <th>备注</th>
                      <th style="width: 50px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->orderid); ?></td>
                            <td><?php echo e($order->shop_name); ?></td>
							<td><?php echo e($order->shop_phone); ?></td>
							<td><?php echo e($order->goods_num); ?></td>
							<td><?php echo e($order->create_time); ?></td>
							<td><?php echo e($order->addressid); ?></td>
							<td><?php echo e($order->amount); ?></td>
							<td><?php if($order->status=="0"): ?>已发货 <?php elseif($order->status=="1"): ?>正在配送 <?php else: ?>未配送 <?php endif; ?></td>
							<td><?php echo e($order->order_description); ?></td>
							<td><?php echo e($order->over_times); ?></td>
							<td><?php echo e($order->delivery_fee); ?></td>
							<td><?php echo e($order->lunch_box_fee); ?></td>
							<td><?php echo e($order->service_time); ?></td>
							<td><?php echo e($order->pay); ?></td>
							<td><?php echo e($order->distribution); ?></td>
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