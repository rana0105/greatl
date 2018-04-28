
<?php $__env->startSection('content'); ?>
<!-- Balance-overview  -->
<section class="balance-overview-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="balance-overview-title overflow-fix">
					<div class="page-highlight overflow-fix">
						<h2>Balance Overview</h2>
					</div>
				</div>
				<div class="balance-overview-conetnt box-white-bg overflow-fix">
					<div class="balance-overview-tab-title overflow-fix">
						<ul class="nav"  role="tablist">
							<li>
								<a class="active" id="balanceo-work-in-progress" data-toggle="tab" href="#balance-work-in-progress" >Work In Progress</a>
							</li>
							<li>
								<a  id="balanceo-pending" data-toggle="tab" href="#balance-pending" >Pending</a>
							</li>
							<li>
								<a  id="balanceo-available" data-toggle="tab" href="#balance-available" >Available</a>
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
										  <th>Client</th>
										  <th>Amount Name</th>
										</tr>
									  </thead>
									  <tbody>
											<tr>
											  <td><a href="3.3-Project-Details.php">UX Design and Front end development</a></td>
											  <td>Mark Samad</td>
											  <th>$300 (USD)</th>
											</tr>
											<tr>
											  <td></td>
											  <td class="tabil-total">Total</td>
											  <th>$300 (USD)</th>
											</tr>
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
										  <th>Client</th>
										  <th>Proccessing Date</th>
										  <th>Amount Name</th>
										</tr>
									  </thead>
									  <tbody>
											<tr>
											  <td><a href="3.3-Project-Details.php">UX Design and Front end development</a></td>
											  <td>Mark Samad</td>
											  <td></td>
											  <th>$300 (USD)</th>
											</tr>
											<tr>
											  <td></td>
											  <td></td>
											  <td class="tabil-total">Total</td>
											  <th>$300 (USD)</th>
											</tr>
									  </tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="balance-available" role="tabpanel">
								<div class="balance-overview-available overflow-fix">
									<h6>$<span> <?php echo e(($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw); ?> (USD)</span></h6>
									<p>You earned it! Where should we deliver your balance? </p>
									<a href="<?php echo e(url('balance-withdraw')); ?>" class="grren-btn">Withdraw</a>
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
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>