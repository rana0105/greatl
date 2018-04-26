<?php $__env->startSection('content'); ?>
 <div class="col-md-4 col-lg-6 main">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="<?php echo e(url('dashboard')); ?>">Home</a>
        </nav>
        <div class="row">
        <div class="col-md-5">
            <h3>Create</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row" style="margin-bottom: 3%">
        <div class="col-lg-12">
            <?php echo Form::open(['route' => ['users.store'] ]); ?>

                <?php echo $__env->make('user._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- Submit Form Button -->
                <?php echo Form::submit('Create', ['class' => 'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

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