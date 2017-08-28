    <?php $__env->startSection('content'); ?>
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">活动管理</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 活动管理</h3>&nbsp;&nbsp; 
                  <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo e(URL('admin/act/create')); ?>'">添加</button>
                  <!--
                  <div class="box-tools">
                    <form action="<?php echo e(url('admin/act/child')); ?>" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="活动名"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>序号</th>
                      <th>活动名称</th>
                      <th>活动状态</th>
                      <th>浏览总数</th>
                       <!-- <th>投票总数</th> -->
                      <th>作品数量</th>
                      <!-- <th>宣传图片</th>
                      <th>宣传视频</th> -->
                      <th style="width: 100px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->id); ?></td>
                      <td><?php echo e($v->name); ?></td>
                      <td><?php if($v->status==1): ?>活动未开始<?php elseif($v->status==2): ?>活动中<?php else: ?>活动已结束<?php endif; ?></td>
                      <td><?php echo e($v->number); ?></td>
                     <!--  <td>投票总数</td> -->
                      <td>999</td>
                     <!--  <td><img src="http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($v->picname); ?>" width="50px" height="50px"></td>
                      <td><iframe src="<?php echo e($v->viedo); ?>" style="border: 0;width: 160px;height: 90px;"></iframe></td> -->
                      <td><a href="<?php echo e(url('admin/act')); ?>/<?php echo e($v->id); ?>" class="btn btn-xs btn-danger">查看活动详情</a> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <?php echo e($list->render()); ?>

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
                    $("#mydeleteform").attr("action","<?php echo e(url('admin/user')); ?>/"+id).submit(); 
                }
            }
      </script>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>