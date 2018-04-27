<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>"/>
    <title>Great Neighbor</title>

    <?php echo $__env->make('partial.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>

    <style>
        .result-set { margin-top: 1em }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <?php if(Auth::check()): ?>
            <?php echo $__env->make('partial.authorize-navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('partial.index-navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
            <div id="flash-msg">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <?php echo $__env->yieldContent('content'); ?>    
    </div>
    
    <?php echo $__env->make('partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partial.javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>

