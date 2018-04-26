<?php $__env->startSection('content'); ?>
	<div class="col-md-10 col-md-offset-0 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Payment history by Admin</h3>
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
							<th>Client</th>
							<th>Project</th>
							<th>Client Pay</th>
							<th>Freelancer</th>
							<th>Payment</th>
						</tr>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						<?php $__currentLoopData = $paymentFreelancer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($sr++); ?></td>
								<td><?php echo e(date('d-M-Y', strtotime($payment->payment_create))); ?></td>
								<td><?php echo e($payment->client->name); ?></td>
								<td><?php echo e($payment->project->p_title); ?></td>
								<td><?php echo e($payment->client_pay); ?></td>
								<td><?php echo e($payment->freelancer->name); ?></td>
								<td>$ <?php echo e($payment->freelancer_payment); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>