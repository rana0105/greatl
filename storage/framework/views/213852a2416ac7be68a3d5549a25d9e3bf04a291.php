

<?php $__env->startSection('content'); ?>
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Job Level</h3>
			</div>
			<header class="panel-heading">
					<a href="<?php echo e(URL::route('job-level.create')); ?>" class="btn btn-main-inv a-font">Create Job Level</a>
			</header>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						<?php if(session('success')): ?>
							<div class="alert alert-success">
								<?php echo e(session('success')); ?>

							</div>
						<?php endif; ?>
					<thead>
						<th>Sr.</th>
						<th>Name</th>
						<th class="text-align-center">Action</th>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						<?php $__currentLoopData = $joblevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($sr++); ?></td>
								<td><?php echo e($job->job_level); ?></td>
								<td>
									<a href="<?php echo e(URL::route('job-level.edit', $job->id)); ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
								
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>