<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Great Neighbor</title>
     <?php echo $__env->make('partial.dashstyle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>
<body id="dashboard-body">
    <?php echo $__env->make('partial.dashboardhead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partial.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       <div id="flash-msg">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php echo $__env->yieldContent('content'); ?>
       
   
    <!-- Scripts -->
    <?php echo $__env->make('partial.dashjavascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>