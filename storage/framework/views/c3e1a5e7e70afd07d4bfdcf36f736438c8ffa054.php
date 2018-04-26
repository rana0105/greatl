<?php $__env->startSection('title', 'Edit User ' . $user->first_name); ?>
<?php $__env->startSection('content'); ?>
 <div class="col-md-4 col-lg-6 main">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="<?php echo e(url('dashboard')); ?>">Home</a>
        </nav>
        <div class="row">
        <div class="col-md-5">
            <h3>Edit <?php echo e($user->first_name); ?></h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row" style="margin-bottom: 3%">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <?php echo Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]); ?>

                            <?php echo $__env->make('user._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <!-- Submit Form Button -->
                            <?php echo Form::submit('Save Changes', ['class' => 'btn btn-primary']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
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