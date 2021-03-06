

<?php $__env->startSection('content'); ?>
   <!-- project-search-area -->
<section class="section-title-new  overflow-fix">
   <div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h3><?php echo e(sizeof($projects)); ?> projects post for freelacners!</h3>
   			</div>
   		</div>
   </div>
</section>
		
<!-- End project-search-area -->

<!-- project-list-area -->
<section class="project-list-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div id="porject-list-full-area" class="overflow-fix show">
					<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="single-porject-area mix overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2><?php echo e($pro->p_title); ?></h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<?php
										$second = Carbon::parse($pro->created_at)->diffInSeconds($new);
									      $dt = Carbon::now('Asia/Dhaka');
									      $days = $dt->diffInDays($dt->copy()->addSeconds($second));
									      $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
									      $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));
										?>
										<h6> <?php echo e($pro->ratetype->project_type); ?> - <?php echo e($pro->joblevel->job_level); ?> Level ($$) - Est. Time: <?php echo e($pro->p_less); ?> - <span>Posted <?php echo e(CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans()); ?> ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 <?php echo substr(strip_tags($pro->p_description), 0, 300); ?> <?php echo strlen(strip_tags($pro->p_description)) >300 ? "..." :""; ?><a href="<?php echo e(url('project-details', $pro->id)); ?>">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i><?php echo e($pro->p_jobskill); ?>,</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="<?php echo e(url('project-details', $pro->id)); ?>" class="grren-btn">See Details</a>
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
<!-- End project-list-area -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
	
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>