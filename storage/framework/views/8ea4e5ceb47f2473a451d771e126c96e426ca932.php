<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            作品操作
            <small>preview of simple tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">已审核信息</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row"
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-th"></i> 审核已通过作品管理</h3>&nbsp;&nbsp;
                        <div class="box-tools">
                            <form action="<?php echo e(url('admin/shop/childCom')); ?>" method="get">
                                <div class="input-group" style="width: 150px;">
                                    <input type="text" name="name" class="form-control input-sm pull-right" placeholder="作品名称"/>
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
                                <th style="width:60px">序号</th>
                                <th>作品名称</th>
                                <th>作品类型</th>
                                <th>作者姓名</th>
                                <th>手机号</th>
                                <th>上传时间</th>
                                <th style="width: 100px">操作</th>
                            </tr>

                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($v->id); ?></td>
                                    <td><?php echo e($v->name); ?></td>
                                    <td><?php if($v->type==1): ?>图片<?php elseif($v->type==2): ?>视频<?php else: ?>作文<?php endif; ?></td>
                                    <td><?php echo e($v->author); ?></td>
                                    <td><?php echo e($v->iphone); ?></td>
                                    <td><?php echo e($v->create_time); ?></td>
                                    <td><button onclick='window.location="<?php echo e(url('admin/shop/detailCom')); ?>/<?php echo e($v->id); ?>"' class="btn btn-xs btn-danger">详情</button></td>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>