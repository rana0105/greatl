<?php $__env->startSection('content'); ?>
 <div class="col-md-6 col-lg-8 main">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="<?php echo e(url('dashboard')); ?>">Home</a>
        </nav>
        <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-2">
            <h3 class="modal-title"><?php echo e($result->total()); ?> <?php echo e(str_plural('User', $result->count())); ?> </h3>
        </div>
        <div class="col-md-12 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_users')): ?>
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                <th class="text-center">Actions</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $sr = 1; ?>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sr++); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->username); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->roles->implode('name', ', ')); ?></td>
                    <td><?php echo e($item->created_at->toFormattedDateString()); ?></td>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                    <td class="text-center">
                        <?php echo $__env->make('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div id="t-cent">
            <?php echo e($result->links()); ?>

        </div>
    </div>
    </div>
      <!-- #main col-->
    </div>
    <!-- #row -->

  </div>
  <!-- #container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>