
<?php $__env->startSection('content'); ?>
<section class="main-project-details-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-8">
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="project-details-title overflow-fix">
						<h2><?php echo e($post->p_title); ?></h2>
						<?php
						$second = Carbon::parse($post->created_at)->diffInSeconds($new);
					      $dt = Carbon::now('Asia/Dhaka');
					      $days = $dt->diffInDays($dt->copy()->addSeconds($second));
					      $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
					      $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));
						?>
						<span>Posted <?php echo e(CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans()); ?> ago</span>
					</div>
					<div class="project-details-skil overflow-fix">
						<ul class="d-flex justify-content-start">
							<li><?php echo e($post->projectcat->project_cat); ?></li>
						</ul>
					</div>
					<div class="project-details-type overflow-fix d-flex justify-content-start">
						<ul>
							<li><?php echo e($post->ratetype->project_type); ?></li>
							<li><?php echo e($post->p_buddget); ?></li>
						</ul>
						<ul>
							<li><?php echo e($post->joblevel->job_level); ?></li>
							<li>Level</li>
						</ul>
						<ul>
							<li>Project Start</li>
							<li><?php echo e(date('d, M, Y', strtotime($post->p_sdate))); ?></li>
						</ul>
					</div>
					<div class="project-details-conetnt overflow-fix">
						<h2 class="project-details-conetnt-title">Details</h2>
						<div class="project-details-attachment overflow-fix">
						<?php echo $post->p_description; ?>

						</div>
						<div class="project-details-attachment overflow-fix">
							<ul>
							<?php $__currentLoopData = $cfile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($cf->c_file); ?>" target="blank"> <i class="fa fa-paperclip" aria-hidden="true"></i><?php echo e($cf->c_file); ?> ﬁle here</a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="project-details-bit-area overflow-fix box-white-bg">
					<div class="page-highlight overflow-fix">
						<h2><?php echo e($bid); ?> freelancers bid on this project</h2>
					</div>
					<?php if($jobap == null): ?>
						<h3>Any freelancer didn't apply this job!</h3>
					<?php else: ?>
						<?php $__currentLoopData = $jobap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="single-profile-item box-white-bg overflow-fix">
							<div class="row padding-o">
								<div class="col-lg-3">	
									<div class="single-profile-item-img overflow-fix">
										<a href=""><img src="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($ap->p_image); ?>"></a>
									</div>
								</div>
								<div class="col-lg-9 padding-o">	
									<div class="single-profile-single-item overflow-fix">
										<div class="single-profile-heading overflow-fix d-flex justify-content-start">
											<a href="#"><h2><?php echo e(isset($ap->name) ? $ap->name : 'Not apply this job any freelancers'); ?></h2></a>
											<ul>
												<li>
													<div class="profile-simple-rating d-flex">
													<?php for($star=1; $star<=5; $star++): ?>
														<?php if($ap->ratingf >= $star): ?>
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
											<h6><?php echo e($ap->designation); ?></h6>
										</div>
										
										<div class="single-profile-skill overflow-fix">
											<p>Skills:</p>
											<ul>
												<li><i><?php echo e($ap->skill); ?>,</i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
				<div class="project-details-similar-area overflow-fix">
					<input type="hidden" name="similer" class="freeid"  value="<?php echo e(Auth::user()->id); ?>">
					<h2 class="project-details-similar-title-area">More Job for You !</h2>
					<main class="new-posgress-updat overflow-fix similer">

					</main>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="project-details-sidebar-area overflow-fix">
					<a href="<?php echo e(url('apply-job', $post)); ?>"><button type="submit">Apply This Job</button></a>
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<h2>About the client</h2>
						
						<ul class="d-flex justify-content-between">
							<li>Total Job Post</li>
							<li><?php echo e($totalp); ?></li>
						</ul>
						<ul class="d-flex justify-content-between">
							<li>Total Spent</li>
							<li>$ <?php echo e($spent); ?></li>
						</ul>
						
					</div>
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<?php $__currentLoopData = $clientlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<ul class="d-flex justify-content-between">
							<li><?php echo e($lan->language); ?>:</li>
							<li><?php echo e($lan->proficiency); ?></li>
						</ul>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<ul class="d-flex justify-content-between">
							<li>City</li>
							<li><?php echo e($clientinfo->city); ?></li>
						</ul>
					</div>
					<div class="project-details-single-sidebar-textarea overflow-fix">
						<h2 class="project-details-single-sidebar-textarea overflow-fix">To discuss abot this project.</h2>
						<div class="project-details-single-sidebar overflow-fix box-white-bg">
							<h2>Message</h2>
							<textarea placeholder=""></textarea>
							<button type="submit">Sent</button>
						</div>
					</div>
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<h5><img src="<?php echo e(asset('images/shield.png')); ?>"/>Payment Veriﬁed</h5>
					</div>
				</div>
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
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
	        var freeid = $(".freeid").val().trim();
	        //alert(freeid);
	        $.ajax({
				url:'<?php echo e(URL::to('/getSimilerjob')); ?>',
				type: "get",
				data: {
					'freeid':freeid,
				},
				success: function(data) {
					$('.similer').html(data);
					//console.log(data);
				}
			});

	    
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>