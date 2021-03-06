

<?php $__env->startSection('content'); ?>
<!-- project-search-area -->
<section class="section-title-new  overflow-fix">
   <div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h3><?php echo e(sizeof($freelancers)); ?> Freelancers profile!</h3>
   			</div>
   		</div>
   </div>
</section>
<!-- End project-search-area -->


<!-- Profile-Search-area -->
<section class="profile-item-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="single-profile-item box-white-bg overflow-fix catshow">
					<?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $free): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-2">	
								<div class="single-profile-item-img overflow-fix">
									<a href=""><img src="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($free['p_image']); ?>"/></a>
								</div>
							</div>
							<div class="col-lg-8">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<a href="<?php echo e(url('freelancer-profile', $free['user_idu'])); ?>"><h2><?php echo e($free['name']); ?></h2></a>
										<ul>
											<li><a href=""><?php echo e($free['hourly_rate' ]); ?>$/hr</a></li>
											<li><a href=""><?php echo e($free['experience']); ?></a></li>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php for($star=1; $star<=5; $star++): ?>
														<?php if($free->ratingf >= $star): ?>
														<i class="fa fa-star" aria-hidden="true"></i>
														<?php else: ?>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<?php endif; ?>
													<?php endfor; ?>
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6><?php echo e($free['designation']); ?></h6>
									</div>
									<div class="single-profile-datalist overflow-fix">
									<?php echo e(str_limit(strip_tags($free['overview']), 300)); ?>

							            <?php if(strlen(strip_tags($free['overview'])) > 300): ?>
							              ... <a href="<?php echo e(url('freelancer-profile', $free['user_idu'])); ?>" class="">Read More</a>
							            <?php endif; ?>
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i><?php echo e($free['skill']); ?>,</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="<?php echo e(url('freelancer-profile', $free['user_idu'])); ?>" class="grren-btn">View Profile</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="pagination-area overflow-fix">
					<div class="pagi">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>