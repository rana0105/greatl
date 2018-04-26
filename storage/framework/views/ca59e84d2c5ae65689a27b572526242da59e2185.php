

<?php $__env->startSection('content'); ?>
<section class="main-project-details-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="project-details-title overflow-fix">
						<?php if(session('success')): ?>
							<div class="alert alert-success">
								<?php echo e(session('success')); ?>

							</div>
						<?php endif; ?>
						<h2><?php echo e($project->p_title); ?></h2>
						<span>Posted <?php echo e(Carbon::parse($project->created_at)->diffForHumans()); ?></span>
					</div>
					<div class="project-details-skil overflow-fix">
						<ul class="d-flex justify-content-start">
							<li><?php echo e($project->projectcat->project_cat); ?></li>
						</ul>
					</div>
					<div class="project-details-type overflow-fix d-flex justify-content-start">
						<ul>
							<li><?php echo e($project->ratetype->project_type); ?></li>
							<li><?php echo e($project->p_buddget); ?></li>
						</ul>
						<ul>
							<li><?php echo e($project->joblevel->job_level); ?></li>
							<li>Level</li>
						</ul>
						<ul>
							<li>Project Start</li>
							<li><?php echo e(date('d, M, Y', strtotime($project->p_sdate))); ?></li>
						</ul>
					</div>
					<div class="project-details-conetnt overflow-fix">
						<h2 class="project-details-conetnt-title">Details</h2>
						<div class="project-details-attachment overflow-fix">
							<?php echo $project->p_description; ?>

						</div>
						<div class="project-details-attachment overflow-fix">
							<ul>
								<?php $__currentLoopData = $project->clienfile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($cf->c_file); ?>" target="blank"> <i class="fa fa-paperclip" aria-hidden="true"></i><?php echo e($cf->c_file); ?> ﬁle here</a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					<div class="project-edit drop">
						<input type="hidden" name="c_id_post" value="<?php echo e(Auth::user()->id); ?>">
						

						<div class="dropdown project">
						  <button class="btn btn-hirecheck dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <?php if($project->status >= 3): ?>
							<a href="<?php echo e(route('project.payment', $project)); ?>">Pay Now</a>
							<?php endif; ?>
							<a href="<?php echo e(url('post-edit', $project->id)); ?>">Edit Job</a>
							<a href="<?php echo e(route('payment.history', $project)); ?>">Payment</a>
							<a href="<?php echo e(url('hire-complete', $project)); ?>">Hire Complete</a>
							<a href="<?php echo e(url('project-decline', $project)); ?>">Decline</a>
						  </div>
						</div>
					</div>
				</div>
				<div class="project-details-bit-area overflow-fix box-white-bg">
					<div class="page-highlight overflow-fix">
						<h2><?php echo e($project->jobapply()->count()); ?> freelancers bid on this project</h2>
						<?php if(session('success-hired')): ?>
							<div class="alert alert-success">
								<?php echo e(session('success-hired')); ?>

							</div>
						<?php endif; ?>
					</div>
					<?php if($project->jobapply == null): ?>
						<h3>Any freelancer didn't apply this job!</h3>
					<?php else: ?>
						<?php $__currentLoopData = $project->jobapply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="single-profile-item overflow-fix box-white-bg">
							<div class="row padding-o">
								<div class="col-lg-2">	
									<div class="single-profile-item-img overflow-fix">
										<a href=""><img src="<?php echo e(asset('app_images/resize_images/'.$apply->jobapplyfree->freelencer->p_image)); ?>"></a>
									</div>
								</div>
								<div class="col-lg-8">	
									<div class="single-profile-single-item overflow-fix">
										<div class="single-profile-heading overflow-fix">
											<a href="<?php echo e(url('freelancer-profile', $apply->jobapplyfree->id)); ?>"><h2><?php echo e($apply->jobapplyfree->name); ?></h2></a>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php $ratingAvg = $apply->jobapplyfree->freelancerRating->avg('ratingf'); ?>
													<?php for($star=1; $star<=5; $star++): ?>
														<?php if($ratingAvg >= $star): ?>
														<i class="fa fa-star" aria-hidden="true"></i>
														<?php elseif(strpos($ratingAvg,'.')): ?>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<?php else: ?>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<?php endif; ?>
													<?php endfor; ?>
												</div>
											
											</li>
										</div>
										<div class="single-profile-subject overflow-fix">
											<h6><?php echo e($apply->freelencer->designation); ?></h6>
										</div>
										<div class="single-profile-datalist overflow-fix">
											<?php echo e($apply->coverletter); ?><a href="#">more</a>
										</div>
									</div>
								</div>
								<div class="col-lg-2 d-flex align-items-end">
									<div class="applyerInfoInClient see-dtiles-button overflow-fix">
										<a href="<?php echo e(route('client.freelancer.profile', $apply->jobapplyfree)); ?>" class="grren-btn">View Profile</a>
										<a href="<?php echo e(route('project.message.show',[$project, $apply->jobapplyfree->id])); ?>" class="grren-btn">Message</a>
										<?php if($apply->job_apply_status == 1): ?>
										<form class="overflow-fix form-btn " action="<?php echo e(route('project.cancel.freelancer', $apply->id)); ?>" method="post">
											<?php echo e(csrf_field()); ?>

											<input type="hidden" name="jobpost_id" value="<?php echo e($project->id); ?>">
											<input type="hidden" name="freelancer_id" value="<?php echo e($apply->jobapplyfree->id); ?>">
											<button type="submit" class="grren-btn">Cancel</button>
										</form>
										<?php elseif($apply->job_apply_status == 2): ?>
										<a href="#" class="red-btn">Removed</a>
										<?php else: ?>
										<form class="overflow-fix form-btn " action="<?php echo e(route('apply.hire', $apply->id)); ?>" method="post">
											<?php echo e(csrf_field()); ?>

											<button type="submit" class="grren-btn">Hire</button>
										</form>
										<?php endif; ?>
										<a href="<?php echo e(route('freereview', [$project->id, $apply->jobapplyfree->id])); ?>" class="grren-btn">Review</a>
										<input type="hidden" name="free_idr" value="<?php echo e($apply->jobapplyfree->id); ?>">
									</div>
								</div>
							</div>
							<div class="row justify-content-end application-list-bid-ammount margin-o">
								<div class="col-10">
									<p>Bid Amount:<span> $<?php echo e($apply->bidamount); ?> USD</span></p>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style>
	.btn-hirecheck {
		background: #0d9b49;
		color: #ffffff;
	}

	.project-edit.drop a {
	    background: #0d9b49;
	    display: block;	
	    font-size: 12px;
	    width: 70%;
	    margin-top: 8px;
	    text-align: center;
	    box-shadow: 0px 0px 5px 0px #0000002e;
	    color: #ecf0f1;
	    padding: 1px 0px 1px 0px;
	    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>