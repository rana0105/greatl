
<?php $__env->startSection('content'); ?>
<!-- Balance-payment-method  -->
<section class="balance-payment-method-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="balance-payment-method-verify-area overflow-fix">
					<div class="balance-payment-method-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Verify Payment Method</h2>
						</div>
					</div>
					<div class="balance-payment-method-verify-conetnt  box-white-bg padding-to overflow-fix">
						<table class="table table-bordered table-hover table-responsive">
						  <thead>
							<tr>
								<th>Method</th>
								<th  >Description</th>
								<th  >Status</th>
							</tr>
						  </thead>
						  <tbody>
								<tr>
									<td><a href="" >Paypal</a></td>
									<td>The fastest method to withdraw funds, directly to your local bank <br>account! Available in selected countries only.</td>
									<td><a href="" class="grren-btn">Set Up Now</a></td>
								</tr>
								<tr>
									<td><a href="">Skrill</a></td>
									<td>Withdraw funds to your Skrill.com account (Formerly known as <br> Moneybookers.com).</td>
									<td><a href=""class="grren-btn table-button-opacity">Verified</a><a href="" class="table-cancle">Delete</a></td>
								</tr>
								<tr>
									<td><a href="">Freelancer Debit Card</a></td>
									<td>Withdraw funds to your Freelancer Debit Card - usable wherever <br> MasterCard is accepted.</td>
									<td><a href="" class="grren-btn">Set Up Now</a></td>
								</tr>
						  </tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End balance-payment-method -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>