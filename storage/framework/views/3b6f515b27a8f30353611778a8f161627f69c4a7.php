

<?php $__env->startSection('content'); ?>
<!-- login form -->
<section class="login-form-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login-form-header overflow-fix">
					<h2>Login and get back to work</h2>
				</div>				
				<form class="login-form overflow-fix" role="form" method="POST" action="<?php echo e(url('login')); ?>">
				<?php if(session('success')): ?>
					<div class="alert alert-success">
						<?php echo e(session('success')); ?>

					</div>
				<?php endif; ?>
				<?php if(session('warning')): ?>
					<div class="alert alert-success">
						<?php echo e(session('warning')); ?>

					</div>
				<?php endif; ?>
				<?php if(session('error')): ?>
					<div class="alert alert-danger">
						<?php echo e(session('error')); ?>

					</div>
				<?php endif; ?>
					<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
					<div class="form-group<?php echo e($errors->has('emailuser') ? ' has-error' : ''); ?>">
						<div class="login-form-input overflow-fix">
							<p>Email or Username</p>
							<input id="email" type="text" name="emailuser" value="<?php echo e(old('emailuser')); ?>" required="" autofocus="">
							<?php if($errors->has('emailuser')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('emailuser')); ?></strong>
	                            </span>
	                        <?php endif; ?>
						</div>
					</div>
					<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
						<div class="login-form-input overflow-fix">
							<p>Password</p>
							<input id="password" type="password" name="password" required="">
							<?php if($errors->has('password')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('password')); ?></strong>
	                            </span>
	                        <?php endif; ?>
						</div>
					</div>
					<div class="login-form-checkbox overflow-fix">
						<label class="custom-control custom-checkbox">
						  <input type="checkbox" class="custom-control-input">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description">
							Remember me
						  </span>
						</label>
					</div>
					<div class="forgot-password overflow-fix">
						<a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
					</div>
					<div class="login-form-submit-btn overflow-fix">
						<input type="submit" class="grren-btn" value="login">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End login form -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>