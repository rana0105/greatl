

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
							<h2><?php echo e($receiver->name); ?> <span>(Freelencer)</span> </h2>
						</div>
							<?php $popsUser = json_encode([
								'id'=>Auth::user()->id,
								'pic' => Auth::user()->profilePic->p_image]); ?>
							<?php $propsReceiver = json_encode([
								'id'=>$receiver->id,
								'pic' => $receiver->profilePic->p_image]); ?>
						<messages
							:project="<?php echo e($project->id); ?>"
							:user="<?php echo e($popsUser); ?>"
							:receiver="<?php echo e($propsReceiver); ?>"
						></messages>
					</div>

				</div>
			</div>
		</div>
	</div>
	
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>