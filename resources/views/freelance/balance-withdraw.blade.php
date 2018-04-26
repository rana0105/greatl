@extends('layouts.main')
@section('content')
<!-- Balance-widthdraw  -->
<section class="balance-widthdraw-area  content-bg overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="balance-widthdraw-request-area overflow-fix">
					<div class="balance-widthdraw-request-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Withdrawl Request</h2>
						</div>
					</div>
					<div class="balance-widthdraw-request-conetnt overflow-fix box-white-bg padding-to table-responsive">
						<form action="{{ route('freelance.balance.withdraw') }}" method="POST">
							{{ csrf_field() }}
							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif
							@if(session('warning'))
								<div class="alert alert-warning">
									{{ session('warning') }}
								</div>
							@endif
							<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Currency</th>
									<th>Balance</th>
									<th>Withdraw Amount</th>
									<th>Withdraw To</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>USD (Primary)</td>
									<td>$ {{ ($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw }} (USD)</td>
									<td class="table-input-color">$ (USD):<span><input max="{{ round(($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw) }}" type="number" name="withdraw_amount" placeholder="Amount" required="" /></span></td>
									<td>
										<div class="table-withdraw-mathor">
											<input type="radio" name="payment" value="paypal">
											<a href="">Paypal</a>
											<input type="radio" name="payment" value="skrill">
											<a href="">Skrill</a>
											<input type="radio" name="payment" value="payoneer">
											<a href="">Payoneer</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
					</div>
				</div>
				<div class="balance-widthdraw-payment-method-area overflow-fix">
					<div class="balance-widthdraw-payment-method-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Payment Method Policy</h2>
						</div>
					</div>
					<div class="balance-widthdraw-payment-method-conetnt overflow-fix box-white-bg padding-to">
						<table class="table table-bordered table-hover table-responsive">
							<thead>
								<tr>
									<th>Method</th>
									<th>Description</th>
									<th>Fee</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="">Paypal</a></td>
									<td>The fastest method to withdraw funds, directly to your local bank account! Available in selected countries only.</td>
									<td>No Fee</td>
								</tr>
								<tr>
									<td><a href="">Skrill</a></td>
									<td>Withdraw funds to your Skrill.com account (Formerly known as Moneybookers.com).</td>
									<td>No Fee</td>
								</tr>
								<tr>
									<td><a href="">Freelancer Debit Card</a></td>
									<td>Withdraw funds to your Freelancer Debit Card - usable wherever MasterCard is accepted.</td>
									<td>No Fee</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="balance-widthdraw-payment-method-notice overflow-fix">
						<p>Note: Your first withdrawal is delayed for 15 days for security reasons.</p>
						<p>Withdrawals are processed twice a week, as long as the requests are lodged before:</p>
							<ul>
								<li>5pm on Sundays EDT (New York), which is 7am on Monday AEST (Sydney). Processed on Monday (NY)/ Tuesday (Sydney).</li>
								<li>5pm on Wednesday EDT (New York), which is 7am on Thursday AEST (Sydney). Processed on Thursday (NY)/ Friday (Sydney).</li>
							</ul>	
						<p>Additional fees may also be charged by third party gateways such as Paypal, Skrill and Payoneer. </p>
					</div>
				</div>
				<div class="balance-widthdraw-panding-area overflow-fix">
					<div class="balance-widthdraw-panding-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Panding Withdrawl</h2>
						</div>
					</div>
					<div class="balance-widthdraw-panding-conetnt overflow-fix box-white-bg padding-to">
						<table class="table table-bordered table-hover table-responsive">
							<thead>
								<tr class="row margin-o">
									<th class="col-lg-2">Requested at</th>
									<th class="col-lg-2">Amount</th>
									<th class="col-lg-4">Details</th>
									<th class="col-lg-2">Status</th>
									<th class="col-lg-2">Processing Date</th>
								</tr>	
							</thead>
							<tbody>
							@if(sizeof($pendingBalance) > 0)
								@foreach($pendingBalance as $pending)
								<tr class="row margin-o">
									<td class="col-lg-2"><a href="">Paypal</a></td>
									<td class="col-lg-2">$ {{ $pending->withdraw_amount }} (USD)</td>
									<td class="col-lg-4"></td>
									<td class="col-lg-2">
										@if($pending->status == 0)
										Pending
										@endif
									</td>
									<td class="col-lg-2">{{ date('d-M-Y', strtotime($pending->created_at)) }}</td>
								</tr>
								@endforeach
							@else
								<tr>
									<th style="text-align: center;">No Pending Request</th>
								</tr>
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End balance-widthdraw -->
@endsection