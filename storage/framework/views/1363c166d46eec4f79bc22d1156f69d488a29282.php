    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">菜单信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 菜单信息管理</h3>
                  <div class="box-tools">
                    <form action="<?php echo e(url('merchant/food')); ?>" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="title" class="form-control input-sm pull-right" placeholder="菜名"/>
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
                      <th>id号</th>
                      <th>菜品类别</th>
                      <th>菜名</th>
                      <th>菜图片</th>
                      <th>菜介绍</th>
                      <th>菜价格</th>
                      <th>月销量</th>
                      <th>菜评分</th>
                      <th>规格</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->id); ?></td>
                      <td><?php echo e($v->typename); ?></td>
                      <td><?php echo e($v->title); ?></td>
                      <td><img style="width:50px;height:50px;" src='<?php echo e(asset("upload/merchant/food/$v->picname")); ?>'/></td>
                      <td><?php echo e($v->descr); ?></td>
                      <td><?php echo e($v->price); ?></td>
                      <td><?php echo e($v->num); ?></td>
                      <td><?php echo e($v->food_rate); ?></td>
                      <td><?php echo e($v->norms); ?></td>
                      <td><?php echo e($v->stutas); ?></td>
                      <td><?php echo e($v->create_time); ?></td>
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/food/edit')); ?>/<?php echo e($v->id); ?>'">编辑</button> <button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> </td>
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 <?php echo e($list->links()); ?>

                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection("myscript"); ?>
      <script type="text/javascript">
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","<?php echo e(url('merchant/food/destroy')); ?>/"+id).submit(); 
                }
            }
      </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>