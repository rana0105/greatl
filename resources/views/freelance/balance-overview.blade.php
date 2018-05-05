@extends('layouts.main')
@section('content')
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
									  	@if(sizeof($jobApplyprog)>0)
									  	@foreach($jobApplyprog as $job)
											<tr>
											  <td><a href="#">{{ $job->postjob->p_title }}</a></td>
											  <td>{{ $job->clientName->name }}</td>
											  <th>${{ $job->getpaid }} (USD)</th>
											</tr>
											<tr>
										@endforeach
											  <td></td>
											  <td class="tabil-total">Total</td>
											  <th>${{ $jobApplyprog->sum('getpaid') }} (USD)</th>
											</tr>
										@else
										<tr>
											<td colspan="3">Data not found yet !</td>
										</tr>
										@endif
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
										  <th>Amount</th>
										</tr>
									  </thead>
									  <tbody>
									  	@if(sizeof($jobApplypen)>0)
									  	@foreach($jobApplypen as $jobpen)
											<tr>
											  <td><a href="#">{{ $jobpen->postjob->p_title }}</a></td>
											  <td>{{ $jobpen->clientName->name }}</td>
											  <td>{{ date('d-M-Y', strtotime($jobpen->updated_at)) }}</td>
											  <th>${{ $jobpen->getpaid }} (USD)</th>
											</tr>
											@endforeach
											<tr>
											  <td></td>
											  <td></td>
											  <td class="tabil-total">Total</td>
											  <th>${{ $jobApplypen->sum('getpaid') }} (USD)</th>
											</tr>
											@else
											<tr>
												<td colspan="4">Data not found yet !</td>
											</tr>
											@endif
									  </tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="balance-available" role="tabpanel">
								<div class="balance-overview-available overflow-fix">
									<h6>$<span> {{ ($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw }} (USD)</span></h6>
									<p>You earned it! Where should we deliver your balance? </p>
									<a href="{{ url('balance-withdraw') }}" class="grren-btn">Withdraw</a>
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
@endsection