<?php $__env->startSection('content'); ?>
	<div class="col-md-10 col-md-offset-0 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Withdraw history by Admin</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						<?php if(session('success')): ?>
							<div class="alert alert-success">
								<?php echo e(session('success')); ?>

							</div>
						<?php endif; ?>
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Date</th>
							<th>Freelancer</th>
							<th>Request Amount</th>
							<th>Faild Amount</th>
							<th>Status</th>
							<th>Aciton</th>
						</tr>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						<?php $__currentLoopData = $freeWithdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($sr++); ?></td>
								<td><?php echo e(date('d-M-Y', strtotime($withdraw->created_at))); ?></td>
								<td><?php echo e($withdraw->freelancer->name); ?></td>
								<td>$ <?php echo e($withdraw->withdraw_amount); ?></td>
								<td>$ <?php echo e($withdraw->faild_amount); ?></td>
								<td>
									<?php if($withdraw->status == 1): ?>
									<span class="label label-success">Complete</span> 
									<?php else: ?>
									<span class="label label-info">Pending</span>
									<?php endif; ?>
								</td>
								<td>
									<?php if(!$withdraw->status == 1): ?>
									<?php if($withdraw->faild_amount == null): ?>
									<form class="submit_form" action="<?php echo e(route('faild.amount', $withdraw->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<button class="btn alert_show"><i class="fa fa-window-close-o fa-lg text-danger" aria-hidden="true"></i></button>
									</form>
									<?php else: ?>
									<form class="submit_form" action="<?php echo e(route('retry.amount', $withdraw->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<button class="btn alert_show"><i class="fa fa-refresh fa-lg text-warning" aria-hidden="true"></i></button>
									</form>
									<?php endif; ?>
									<?php if($withdraw->faild_amount == null): ?>
									<form class="submit_form" action="<?php echo e(route('status.complete', $withdraw->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<button class="btn alert_show"><i class="fa fa-paper-plane-o fa-lg text-primary" aria-hidden="true"></i></button>
									</form>
									<?php endif; ?>
									<?php else: ?>
									<button class="btn"><i class="fa  fa-check-square-o fa-lg text-success" aria-hidden="true"></i></button>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$('button.alert_show').on('click', function(e){
	e.preventDefault();
	var self = $(this);
	swal({
	    title             : "Are you sure?",
	    text              : "You will not be able to recover this!",
	    type              : "warning",
	    showCancelButton  : true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText : "Yes, Update It!",
	    cancelButtonText  : "No, Cancel Update!",
	    closeOnConfirm    : false,
	    closeOnCancel     : false
	},
	function(isConfirm){
	    if(isConfirm){
	        swal("Updated!","It has been updated", "success");
	        setTimeout(function() {
	            self.parents(".submit_form").submit();
	        }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
	    }
	    else{
	          swal("Cancelled","It is safe", "error");
	    }
	});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>