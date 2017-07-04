<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p><?php echo e($v->shopname); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>