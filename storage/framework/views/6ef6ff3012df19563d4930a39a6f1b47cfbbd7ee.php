
<?php $__env->startSection('content'); ?>
<!-- project-details-area -->
<section class="main-project-details-area overflow-fix freelancers-profile-area  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-8">
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-3">	
								<div class="single-profile-item-img overflow-fix">
									<a href="#"><img src="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($freelencerProfile->freelencer->p_image); ?>"></a>
								</div>
							</div>
							<div class="col-lg-9 padding-o">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<h2><?php echo e($freelencerProfile->name); ?></h2>
										<online-status :user="<?php echo e($freelencerProfile->id); ?>"></online-status>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6><?php echo e($freelencerProfile->freelencer->designation); ?></h6>
									</div>
									<div class="single-profile-heading overflow-fix freelancer-rating-text">
										<ul>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php $ratingAvg = $freelencerProfile->freelancerRating->avg('ratingf'); ?>
													<?php for($star=1; $star<=5; $star++): ?>
														<?php if($ratingAvg >= $star): ?>
														<i class="fa fa-star" aria-hidden="true"></i>
														<?php elseif(strpos($ratingAvg,'.')): ?>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<?php else: ?>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<?php endif; ?>
													<?php endfor; ?>
													<?php if($ratingAvg != 0): ?>	
													&nbsp; <?php echo e(round($ratingAvg,1)); ?> <?php echo e('out of 5'); ?>

													<?php else: ?>
													&nbsp; <?php echo e('0 out of 5'); ?>

													<?php endif; ?>	
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i><?php echo e($freelencerProfile->freelencer->skill); ?>,</i></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="project-details-conetnt overflow-fix">
						<h2 class="project-details-conetnt-title">Overview</h2>
						<div class="project-details-attachment overflow-fix">
							<?php echo e($freelencerProfile->freelencer->overview); ?>

						</div>
					</div>
				</div>
				
				<div class="project-details-similar-area overflow-fix">
					<h2 class="project-details-similar-title-area">Work History and Feedback</h2>
					<main class="blog masonry">
					  <div class="project-details-similar-single-area post overflow-fix">
							<h2><a href="#">Pull-Up Banner. Modern Simple Deﬂgn</a></h2>
							<h6>Posted 10 minutes ago</h6>
							<ul>
								<li>Fixed Price</li>
								<li>Budget: $200</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post overflow-fix">
							<h2><a href="#">Pull-Up Banner. Modern Simple Deﬂgn</a></h2>
							<h6>Posted 10 minutes ago</h6>
							<ul>
								<li>Hourly</li>
								<li>Less than 30 hrs/week</li>
								<li>I to 3 months</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post overflow-fix">
							<h2><a href="#">Pull-Up Banner. Modern Simple Deﬂgn</a></h2>
							<h6>Posted 10 minutes ago</h6>
							<ul>
								<li>Hourly</li>
								<li>Less than 30 hrs/week</li>
								<li>I to 3 months</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post overflow-fix">
							<h2><a href="#">Pull-Up Banner. Modern Simple Deﬂgn</a></h2>
							<h6>Posted 10 minutes ago</h6>
							<ul>
								<li>Fixed Price</li>
								<li>Budget: $200</li>
							</ul>
						</div>
					</main>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="project-details-sidebar-area overflow-fix">
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<ul class="d-flex justify-content-between">
							<li>Hourly Rate:</li>
							<li>$ <?php echo e($freelencerProfile->freelencer->hourly_rate); ?></li>
						</ul>
						<ul class="d-flex justify-content-between">
							<li>Experience</li>
							<li><?php echo e($freelencerProfile->freelencer->experience); ?> Year</li>
						</ul>
						
						<ul class="d-flex justify-content-between">
							<li>Availability:</li>
							<li><?php echo e($freelencerProfile->freelencer->availability); ?></li>
						</ul>
					</div>
					
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
					<?php $__currentLoopData = $freelencerProfile->freelencer->language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $la): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<ul class="d-flex justify-content-between">
							<li><?php echo e($la->language); ?>:</li>
							<li><?php echo e($la->proficiency); ?></li>
						</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="project-details-single-sidebar-textarea overflow-fix">
						
						<div class="project-details-single-sidebar overflow-fix box-white-bg">
							
							<h2>Message</h2>
							<textarea placeholder=""></textarea>
							<button type="submit">Sent</button>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-details-area -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>