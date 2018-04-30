
<?php $__env->startSection('content'); ?>
<!-- Balance-overview  -->
<section class="balance-overview-area overflow-fix content-bg proposal-project-area">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="balance-overview-title overflow-fix">
					<div class="page-highlight overflow-fix">
						<h2>Project Overview</h2>
					</div>
				</div>
				<div class="balance-overview-conetnt box-white-bg overflow-fix">
					<div class="balance-overview-tab-title overflow-fix">
						<ul class="nav"  role="tablist">
							<li>
								<a class="active" id="balanceo-work-in-progress" data-toggle="tab" href="#balance-work-in-progress" >Proposal Work </a>
							</li>
							<li>
								<a  id="balanceo-pending" data-toggle="tab" href="#balance-pending" >Current Work</a>
							</li>
							<li>
								<a  id="balanceo-available" data-toggle="tab" href="#balance-available" >Past Work</a>
							</li>
							<li>
								<a  id="balanceo-contracts" data-toggle="tab" href="#balance-contracts" >All Projects</a>
							</li>
							
						</ul>
					</div>
					
					<div class="balance-overview-tab-content overflow-fix">
						<div class="tab-content">
						    <div class="tab-pane fade show active" id="balance-work-in-progress" role="tabpanel">
								<div class="balance-overview-if-work overflow-fix padding-to">
									<table class="table table-bordered table-hover table-responsive margin-o">
									  <thead>
										<tr>
										  <th>Project Name</th>
										  <th>Bid</th>
										  <th>My Bid</th>
										  <th>Avg Bid</th>
										  <th>End Date</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											  <td><a href="<?php echo e(url('project-details', $ap->job_post_id )); ?>"><?php echo e($ap->postjob->p_title); ?></a></td>
											  <td><?php echo e($ap->bid); ?></td>
											  <th>$<?php echo e($ap->bidamount); ?> (USD)</th>
											  <th>$<?php echo e($ap->avg); ?> (USD)</th>
											  <th><?php echo e(date('d M, Y', strtotime($ap->postjob->p_edate))); ?></th>
											  <th>
											  	<div class="dropdown show">
											  		<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 Select
												  </a>
												  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
														
														
															<a class="dropdown-item" href="<?php echo e(route('jobapplydelete', $ap->id)); ?>"
						                                    onclick="event.preventDefault();
						                                             document.getElementById('app-delete').submit();">
						                                    <i class="glyphicon glyphicon-log-out"></i> Cancel Bid
						                                </a>

						                                <form id="app-delete" action="<?php echo e(route('jobapplydelete', $ap->id)); ?>" method="POST" style="display: none;">
						                                    <?php echo e(csrf_field()); ?>

						                                </form>
													</div>
												   </div>
											  </th>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
						    </div>
							<div class="tab-pane fade" id="balance-pending" role="tabpanel">
								<div class="balance-pending-if-work overflow-fix  padding-to">
									<table class="table table-bordered table-hover table-responsive margin-o">
									  <thead>
										<tr>
										  <th>Project Name</th>
										  <th>Employer</th>
										  <th>Budget</th>
										  <th>Deadline</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  	<?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											  <td><a href="<?php echo e(url('project-details', $ap->job_post_id )); ?>"><?php echo e($ap->postjob->p_title); ?></a></td>
											  <td><?php echo e($ap->bid); ?></td>
											  <th>$<?php echo e($ap->bidamount); ?> (USD)</th>
											  <th><?php echo e(date('d M, Y', strtotime($ap->postjob->p_edate))); ?></th>
											  <th>
												<div class="dropdown show">
											  		<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 Select
												  </a>
												  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
													<a class="dropdown-item" href="<?php echo e(route('complete', $ap->id)); ?>">
					                                    Complete Work
					                                </a>
                          							<a class="dropdown-item" href="<?php echo e(url('project/'.$ap->job_post_id.'/message')); ?>">
					                                    Send Message
					                                </a>
                          							<a class="dropdown-item" href="<?php echo e(route('review', $ap->id)); ?>">
					                                    Send Review
					                                </a>

													<a class="dropdown-item" href="<?php echo e(route('freelancer.payment.history', $ap->id)); ?>">
					                                    Payment
					                                </a>
												</div>
											   </div>
											  </th>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="balance-available" role="tabpanel">
								<div class="balance-pending-if-work overflow-fix  padding-to">
									<table class="table table-bordered table-hover table-responsive margin-o">
									  <thead>
										<tr>
										  <th>Project Name</th>
										  <th>Employer</th>
										  <th>Budget</th>
										  <th>Duration</th>
										  <th>Feedback</th>
										</tr>
									  </thead>
									  <tbody>
									  	<?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											  <td><a href="<?php echo e(url('project-details', $ap->job_post_id )); ?>"><?php echo e($ap->postjob->p_title); ?></a></td>
											  <td><?php echo e($ap->bid); ?></td>
											  <th>$<?php echo e($ap->bidamount); ?> (USD)</th>
											  <th><?php echo e(date('d M, Y', strtotime($ap->postjob->p_sdate))); ?> <br/>to <?php echo e(date('d M, Y', strtotime($ap->postjob->p_edate))); ?></th>
											  <th>
												<ul class="d-flex rating-poposal">
													<li>
														<div class="profile-simple-rating d-flex">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star rating-neg" aria-hidden="true"></i>
														</div>
													</li>
													<li>(4/5)</li>
												</ul>
											  
											  </th>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="balance-contracts" role="tabpanel">
								<div class="balance-overview-available overflow-fix">
									<?php $__currentLoopData = $apply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<p class="all-job-style">
										<a href="<?php echo e(url('project-details', $ap->job_post_id )); ?>"><?php echo e($ap->postjob->p_title); ?></a>
									</p>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End balance-overview -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style type="text/css">
	element.style {
    position: absolute;
    top: 0px;
    left: 0px;
    will-change: transform;
    transform: translate3d(119px, 64px, 0px);
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>