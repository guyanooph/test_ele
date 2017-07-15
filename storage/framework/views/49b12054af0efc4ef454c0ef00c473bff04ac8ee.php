    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">普通管理员信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 普通管理员管理</h3>&nbsp;&nbsp;	
                  <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo e(URL('admin/user/create')); ?>'">添加</button>
                  <div class="box-tools">
                    <form action="<?php echo e(url('admin/stu')); ?>" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="管理员账号"/>
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
                      <th style="width:60px">ID</th>
                      <th>账号</th>
                      <th>头像</th>
                      <th>手机号</th>
                      <th>角色</th>
                      <th>登录时间</th>
                      <th>修改时间</th>
                      <th>添加时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->id); ?></td>
                      <td><?php echo e($v->name); ?></td>
                      <td><img src="http://oslfm4pmj.bkt.clouddn.com/iwanli/image_<?php echo e($v->picname); ?>" width="50px" height="50px"></td>
                      <td><?php echo e($v->phone); ?></td>
                      <td><?php echo e($v->role); ?></td>
                      <td><?php echo e($v->logtime); ?></td>
                      <td><?php echo e($v->updated_at); ?></td>

                      <td><?php echo e($v->addtime); ?></td>
                      <td><button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> 
                      <button onclick="window.location='<?php echo e(URL('admin/user/edit')); ?>/<?php echo e($v->id); ?>'"class="btn btn-xs btn-primary">编辑</button> </td>
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
                    $("#mydeleteform").attr("action","<?php echo e(url('admin/user')); ?>/"+id).submit(); 
                }
            }
      </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>