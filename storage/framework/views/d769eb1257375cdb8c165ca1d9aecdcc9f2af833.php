<?php $__env->startSection('content'); ?>

    <ul class="list-group">
        <li class="list-group-item">序号: <?php echo e($list->id); ?></li>
        <li class="list-group-item">作品名称: <?php echo e($list->name); ?></li>
        <li class="list-group-item">作品内容: <?php echo e($list->content); ?></li>
        <li class="list-group-item">作品类型: <?php if($list->type==1): ?>图片<?php elseif($list->type==2): ?>视频<?php else: ?>作文<?php endif; ?></li>
        <li class="list-group-item">作者姓名: <?php echo e($list->author); ?></li>
        <li class="list-group-item">手机号码: <?php echo e($list->iphone); ?></li>
        <li class="list-group-item">上传时间: <?php echo e($list->create_time); ?></li>
        <li class="list-group-item">所属城市: <?php echo e($list->cityid); ?></li>
        <li class="list-group-item">所属活动: <?php echo e($list->actid); ?></li>
        <li class="list-group-item">排名: <?php echo e($list->rank); ?></li>
        <li class="list-group-item">得票数: <?php echo e($list->tickets); ?></li>
         <li class="list-group-item">作品状态: <?php echo e($list->status); ?></li>
        <li class="list-group-item">
            <button onclick="window.location='<?php echo e(URL('admin/works/check')); ?>/<?php echo e($list->id); ?>/<?php echo e(2); ?>'"class="btn btn-ms btn-primary">通过审核</button>
            <button onclick="window.location='<?php echo e(URL('admin/works/check')); ?>/<?php echo e($list->id); ?>/<?php echo e(3); ?>'" class="btn btn-ms btn-danger">不通过审核</button></li>

    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>