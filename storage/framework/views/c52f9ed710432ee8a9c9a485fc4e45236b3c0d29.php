
    <!-- form start -->
<<<<<<< HEAD
    <form action="<?php echo e(url('merchant/foodtype/store')); ?>" method="post" id="myaddform" class="form-horizontal">
=======
<<<<<<< HEAD
    <form action="<?php echo e(url('merchant/foodtype/store')); ?>" method="post" id="myaddform" class="form-horizontal">
=======
<<<<<<< HEAD
    <form action="<?php echo e(url('merchant/foodtype')); ?>" method="post" id="myaddform" class="form-horizontal">
=======
    <form action="<?php echo e(url('merchant/foodtype/store')); ?>" method="post" id="myaddform" class="form-horizontal">
>>>>>>> 7b11977032ff4e070b7021d221aea79c05833193
>>>>>>> 5010fc82fee2d6f1543703b56517af92d70c0bd9
>>>>>>> 66676d8a4698d36036499d225ff7ac8f94215ff4
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <input type="hidden" name="shopid" value="<?php echo e($v->shopid); ?>">
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">父类别名：</label>
          <div class="col-sm-4">
            <select name="pid">
                <option value="0">根类别</option>
					<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($v->id); ?>"><?php echo e($v->title); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">类别名称：</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="类别名称" name="title">
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>
			