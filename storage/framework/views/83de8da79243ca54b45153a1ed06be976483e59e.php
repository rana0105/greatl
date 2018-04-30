
<?php $__env->startSection('content'); ?>
<!-- Balance-overview  -->
<section class="balance-overview-area overflow-fix content-bg proposal-project-area freelancer-transaction-area">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight">
						<h2>Transaction History</h2>
					</div>	  	
					<div class="post-button d-flex">
						<span class="align-self-center">Balance: $<?php echo e(($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw); ?> (USD)</span><a href="<?php echo e(url('balance-withdraw')); ?>" class="grren-btn">Withdraw</a>
					</div>
				</div>
				<div class="balance-overview-conetnt box-white-bg overflow-fix">
					<form action="<?php echo e(route('pdf.history')); ?>" method="POST" target="blank">
						<?php echo e(csrf_field()); ?>

						<div class="balance-overview-tab-title overflow-fix d-flex">
							<ul class="nav"  role="tablist">
								<li>
									<a class="active" id="balanceo-work-in-progress" data-toggle="tab" href="#balance-work-in-progress" >All Transaction</a>
								</li>
								
							</ul>
							<div class="ml-auto">
								
								<button type="submit" class="grren-btn">Export</button>
							</div>
						</div>
						<div class="balance-overview-tab-content overflow-fix">
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="balance-work-in-progress" role="tabpanel">
									<div class="weekly-timesheet-clander overflow-fix d-flex padding-to">
										<p>From:</p>
										<input type="text" name="from" id="datepicker"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
										<h6>To</h6>
										<input type="text" name="to" id="datepicker1"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
									</div>
									<div class="d-flex short-table-css overflow-fix">
										<p>Short</p>
										<select  class="project-filter-select">
											<option >50</option>
											<option >10</option>
											<option >20</option>
											<option >5</option>
										</select>
									</div>
									<div class="balance-overview-if-work overflow-fix padding-to">
										<table class="table table-bordered table-hover table-responsive margin-o">
										  <thead>
											<tr>
											  <th>Date</th>
											  <th>Description</th>
											  <th>Invoice</th>
											  <th>Amount</th>
											  <th>Balance</th>
											</tr>
										  </thead>
										  <tbody>
										  	<?php if(sizeof($withdrawPayment)>0): ?>
										  	<?php $__currentLoopData = $withdrawPayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
												  <td><?php echo e(date('d-M-Y', strtotime($payment->created_at))); ?></td>
												  <td><?php echo e($payment->project->p_title); ?></td>
												  <th><a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></th>
												  <th>$<?php echo e($payment->freelancer_payment); ?> (USD)</th>
												  <th>$<?php echo e($payment->freelancer_payment); ?> (USD)</th>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php else: ?>
												<tr>
													<td>No Data found yet !</td>
												</tr>
											<?php endif; ?>
											</tbody>
										</table>
									</div>
							    </div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End balance-overview -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>