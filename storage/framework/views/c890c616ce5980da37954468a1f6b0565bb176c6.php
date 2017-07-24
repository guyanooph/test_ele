<?php $__env->startSection('content'); ?>

    <ul class="list-group">
        <li><h1>商家注册信息</h1> </li>

        <li class="list-group-item">商家表信息id: <?php echo e($list->id); ?></li>
        <li class="list-group-item">店面账户: <?php echo e($list->mername); ?></li>
        <li class="list-group-item">商铺名称: <?php echo e($list->shoptitle); ?></li>
        <li class="list-group-item">店面照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($list->picname); ?>"></li>
        <li class="list-group-item">logo照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($list->logoname); ?>"></li>
        <li class="list-group-item">店面分类: <?php echo e($list->typeid); ?></li>
        <li class="list-group-item">商铺所有者姓名: <?php echo e($list->username); ?></li>
        <li class="list-group-item">身份证: <?php echo e($list->identity); ?></li>
        <li class="list-group-item">电话: <?php echo e($list->phone); ?></li>
        <li class="list-group-item">城市: <?php echo e($list->city); ?></li>
        <li class="list-group-item">经纬度: <?php echo e($list->longitude_latitude); ?></li>
        <li class="list-group-item">详细地址: <?php echo e($list->address); ?></li>
        <li class="list-group-item">状态:待审核</li>
        <li class="list-group-item">注册时间: <?php echo e($list->register_time); ?></li>
        <li class="list-group-item">注册时的ip: <?php echo e($list->first_ip); ?></li>
        <li><h1>商家店铺信息</h1> </li>
        <li class="list-group-item">商家名字: <?php echo e($merchant->shopname); ?></li>
        <li class="list-group-item">logo照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($merchant->logo); ?>"></li>
        <li class="list-group-item">服务评分: <?php echo e($merchant->rate); ?></li>
        <li class="list-group-item">商家地址: <?php echo e($merchant->address); ?></li>
        <li class="list-group-item">电话: <?php echo e($merchant->phone); ?></li>
        <li class="list-group-item">商家介绍公告: <?php echo e($merchant->desc); ?></li>
        <li class="list-group-item">平均配送时间:<?php echo e($merchant->service_time); ?></li>
        <li class="list-group-item">配送费: </li>
        <li class="list-group-item">服务: </li>
        <li class="list-group-item">月销量: </li>
        <li class="list-group-item">营业时间: </li>
        <li class="list-group-item">起送价: </li>
        <li class="list-group-item">配送方式: </li>
        <li class="list-group-item">状态: </li>
        <li class="list-group-item">总销量: </li>

        <li class="list-group-item"><button onclick="window.location='<?php echo e(URL('admin/shop/checkCom')); ?>/<?php echo e($list->id); ?>/<?php echo e(4); ?>'"class="btn btn-ms btn-primary">商家有违规行为，封号</button>


    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>