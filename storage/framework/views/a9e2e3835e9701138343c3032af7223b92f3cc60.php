<?php $__env->startSection('content'); ?>
	<div class="col-md-8 col-md-offset-1 p-top">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Permission</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_permissions')): ?>
						<a href="<?php echo e(URL::route('permissions.create')); ?>" class="btn btn-primary btn-sm">Create</a>
					<?php endif; ?>
			</header>
            <table class="table table-striped table-sm table-responsive">
					<?php if(session('success')): ?>
						<div class="alert alert-success">
							<?php echo e(session('success')); ?>

						</div>
					<?php endif; ?>
				<thead>
					<th>Sr.</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Display Name</th>
					<!--<th class="text-align-center">Action</th>-->
				</thead>

				<tbody>
				<?php $sr = 1; ?>
					<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th><?php echo e($sr++); ?></th>
							<td><?php echo e($permission->name); ?></td>
							<td><?php echo e($permission->guard_name); ?></td>
							<td><?php echo e($permission->display_name); ?></td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				</tbody>
			</table>
			<div class="text-center">
            	<?php echo e($permissions->links()); ?>

        	</div>
        </div>
    </div>
   </div>
   </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>