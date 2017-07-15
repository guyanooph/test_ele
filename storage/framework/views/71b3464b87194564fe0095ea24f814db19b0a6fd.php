<form action="" method="post" id="nodelistform" onsubmit="return false" class="form-inline">
<input type="hidden" name="rid" value="<?php echo e($rid); ?>"/>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php $__currentLoopData = $nodelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="checkbox" style="width:140px;height:35px;">
		<label>
			<input type="checkbox" name="nids[]" value="<?php echo e($vo->id); ?>" <?php echo e(in_array($vo->id,$nids)?"checked":""); ?>> <?php echo e($vo->name); ?>

		</label>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>		