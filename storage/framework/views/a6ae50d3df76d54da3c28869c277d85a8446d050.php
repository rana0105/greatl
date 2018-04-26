<?php $__env->startSection('content'); ?>
<!-- message-box  -->
<section class="message-box-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="message-box overflow-fix">
					<div class="message-box-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Message-box for</h2>
						</div>
					</div>
					<div class="message-box-content overflow-fix box-white-bg">
							<div class="message-usename overflow-fix">
								<h2><?php echo e($project->jobpostclient->name); ?> <span>(<?php echo e($project->p_title); ?>)</span> </h2>
							</div>
							<?php $popsUser = json_encode([
								'id'=>Auth::user()->id,
								'pic' => Auth::user()->profilePic->p_image]); ?>
							<?php $propsReceiver = json_encode([
								'id' => $project->jobpostclient->id,
								'pic' => $project->jobpostclient->profilePic->p_image]); ?>
							<freelencer
								:project="<?php echo e($project->id); ?>"
								:user="<?php echo e($popsUser); ?>"
								:receiver="<?php echo e($propsReceiver); ?>"
							></freelencer>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
	const senderProfile = "<?php echo e($project->jobpostclient->profilePic->p_image); ?>";
	const userProfile = "<?php echo e(Auth::user()->profilePic->p_image); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>