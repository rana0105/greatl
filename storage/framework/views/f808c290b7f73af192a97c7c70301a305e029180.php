<?php $__env->startSection('content'); ?>
<section class="main-project-details-area overflow-fix  content-bg">
    <div class="container my-container">
        <div class="project-post-payment-option-area overflow-fix  box-white-bg">
            <h1 class="payment-title-post"><b><?php echo e($project->p_title); ?></b></h1><hr>
            <h2 class="payment-potion-area">Payment Option</h2>
            <h6 class="chose-payment-potion-area">Choose your payment method</h6>
            <form action="<?php echo e(route('project.payment.checkout', $project)); ?>" method="post">
                <?php if(session('warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('warning')); ?>

                    </div>
                <?php endif; ?>
                <?php echo e(csrf_field()); ?>

                <div class="form-group <?php echo e($errors->has('budget')?'has-error':''); ?>">
                    <label for="budget"> Your Project Budget </label>
                    <?php $currentPayment = $project->deposit->sum('payment') - $project->p_buddget ?>
                    <div class="input-group">
                        <input type="number"
                            <?php if(!$project->deposit): ?> 
                                min="<?php echo e(round($project->p_buddget/2)); ?>"
                            <?php endif; ?> 
                            class="col-sm-6 form-control" value="<?php echo e((-1)*$currentPayment); ?>" name="budget" required="">
                    </div>
                </div>
                <div class="form-group <?php echo e($errors->has('payment_method')?'has-error':''); ?>">
                    <label for="payment_method"> Payment Method </label>
                   
                    <div class="login-form-checkbox overflow-fix">
                        <label class="custom-control custom-checkbox">
                            <input value="paypal" name="payment_method" type="checkbox" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">
                            Paypal
                          </span>
                        </label>
                    </div>
                    <div class="login-form-checkbox overflow-fix">
                        <label class="custom-control custom-checkbox">
                          <input value="card" name="payment_method" type="checkbox" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">
                            visa/master Card
                          </span>
                        </label>
                    </div>






                   
                </div>
                <button type="submit" class="btn btn-primary btn-sm ">Pay Your Budget</button>
            </form>
            <div class="project-post-payment-option  owl-carousel owl-theme overflow-fix">
                <a class="stuff" href="#" data-toggle="modal" data-target="#myModal"><img src="<?php echo e(asset('images/paypal-pay.png')); ?>" alt=""/></a>
                <a class="stuff" href=""><img src="images/mastercard-pay.png" alt=""/></a>
                <a class="stuff" href=""><img src="<?php echo e(asset('images/visa-pay.png')); ?>" alt=""/></a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<!-- End project-details-area -->

<?php $__env->startSection('style'); ?>
<style type="text/css">
    .new-posgress-updat .project-details-similar-single-area {
    width: 48%;
    margin: 5px 5px;
    min-height: 160px;
    padding: 10px;
    max-height: 160px;
    overflow: hidden;
}
.new-proj-sound span p {
    font-size: 10px;
}
.new-posgress-updat button {
    min-width: 120px;
    padding: 7px 5px;
    display: block;
    margin: 0 auto;
    margin-top: 14px;
    clear: both;
    background: #0d9b49;
    border: 0;
    color: #fff;
    cursor: pointer;
    border-radius: 2px;
}
.project-post-payment-option-area {
    padding: 15px;
    margin-bottom: 10px;
}

h1.payment-title-post {
    font-weight: bold;
    text-align: center;
    font-size: 14px;
}

h2.payment-potion-area {
    margin-bottom: 20px;
    font-size: 17px;
}

h6.chose-payment-potion-area {
    margin-bottom: 25px;
}

.project-post-payment-option-area .custom-control-description {
    margin-top: 4px;
}
.profile-simple-rating i{
    font-size: 10px;
    display: block;
    line-height: 15px;
    color: #f8c835;
}
.new-proj-sound span {
    float: left;
}
.feed-backfrom-client {
    border-top: 1px solid #acacac38;
    margin-top: 10px;
    padding-top: 10px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>