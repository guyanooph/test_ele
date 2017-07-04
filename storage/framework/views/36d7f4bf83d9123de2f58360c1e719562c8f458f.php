<?php $__env->startSection('content'); ?>

    <ul class="list-group">
        <li class="list-group-item">id: <?php echo e($list->id); ?></li>
        <li class="list-group-item">店面账户: <?php echo e($list->mername); ?></li>
        <li class="list-group-item">商铺名称: <?php echo e($list->shoptitle); ?></li>
        <li class="list-group-item">店面照片: <?php echo e($list->picname); ?></li>
        <li class="list-group-item">执照照片: <?php echo e($list->license); ?></li>
        <li class="list-group-item">logo照片: <?php echo e($list->logoname); ?></li>
        <li class="list-group-item">店面分类: <?php echo e($list->typeid); ?></li>
        <li class="list-group-item">商铺所有者姓名: <?php echo e($list->username); ?></li>
        <li class="list-group-item">身份证: <?php echo e($list->identity); ?></li>
        <li class="list-group-item">电话: <?php echo e($list->phone); ?></li>
        <li class="list-group-item">城市: <?php echo e($list->city); ?></li>
        <li class="list-group-item">经纬度: <?php echo e($list->longitude_latitude); ?></li>
        <li class="list-group-item">详细地址: <?php echo e($list->address); ?></li>
        <li class="list-group-item">状态: <?php if($list->state=="1"): ?> 待审核 <?php elseif($list->state=="2"): ?> 审核通过 <?php elseif($list->state=="3"): ?> 未通过审核 <?php endif; ?></li>
        <li class="list-group-item">注册时间: <?php echo e($list->register_time); ?></li>
        <li class="list-group-item">注册时的ip: <?php echo e($list->first_ip); ?></li>
        <li class="list-group-item"><button onclick='window.location=""' class="btn btn-ms btn-danger">注册信息不合法，不通过</button> <?php echo e($list->first_ip); ?></li>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>