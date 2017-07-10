    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">营业信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 营业信息管理</h3>
                  <div class="box-tools">
                    <form action="<?php echo e(url('merchant/merchantopen')); ?>" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="商家"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">Id号</th>
                      <th>商家Id</th>
                      <th>商家名称</th>
                      <th>营业时间</th>
					  <th>结束时间</th>
                      <th>起送价</th>
					  <th>配送方式</th>
					  <th>配送费</th>
					  <th>总销量</th>
					  <th>状态</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchantopen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					   <tr>
					       <td><?php echo e($merchantopen->id); ?></td>
						   <td><?php echo e($merchantopen->shopid); ?></td>
						   <td><?php echo e($merchantopen->name); ?></td>
						   <td><?php echo e($merchantopen->opentime); ?></td>
						   <td><?php echo e($merchantopen->overtime); ?></td>
						   <td><?php echo e($merchantopen->givemoney); ?></td>
						   <td><?php if($merchantopen->method=="0"): ?>自营快送 <?php else: ?>蜂鸟快送 <?php endif; ?></td>
						   <td><?php echo e($merchantopen->money); ?></td>
						   <td><?php echo e($merchantopen->num); ?></td>
						   <td><?php if($merchantopen->state=="0"): ?>营业 <?php else: ?>歇业 <?php endif; ?></td>
						   <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/merchantopen/edit')); ?>/<?php echo e($merchantopen->id); ?>'">编辑</button> 
                            <button class="btn btn-xs btn-danger" onclick="javascript:doDel(<?php echo e($merchantopen->id); ?>)">删除</button></td>
                       </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

             
              
            </div><!-- /.col onclick="/merchantopen/<?php echo e($merchantopen->id); ?>/edit"-->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="<?php echo e(url('merchant/merchantopen')); ?>" style="display:none;" id="mydeleteform" name="myform" method="post">
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
                    form.action = "<?php echo e(URL('merchant/merchantopen/destroy')); ?>/"+id;
                    form.submit(); 
                }
              });
        }
      </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>