<?php $__env->startSection('content'); ?>
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Faild Amount history</h3>
			</div>
			<form action="<?php echo e(route('faild.amount', $faildAmount->id)); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<input type="number" readonly="" value="<?php echo e($faildAmount->withdraw_amount); ?>" class="form-control">
				</div>
				<div class="form-group">
					<input type="number" readonly="" name="faild_amount" value="<?php echo e($faildAmount->withdraw_amount); ?>" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>