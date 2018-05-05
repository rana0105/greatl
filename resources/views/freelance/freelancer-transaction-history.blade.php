@extends('layouts.main')
@section('content')
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
						<span class="align-self-center">Balance: ${{ ($withdrawPayment->sum('freelancer_payment')) - $freeWithdraw }} (USD)</span><a href="{{ url('balance-withdraw') }}" class="grren-btn">Withdraw</a>
					</div>
				</div>
				<div class="balance-overview-conetnt box-white-bg overflow-fix">
					<form action="{{ route('pdf.history') }}" method="POST" target="blank">
						{{ csrf_field() }}
						<div class="balance-overview-tab-title overflow-fix d-flex">
							<ul class="nav"  role="tablist">
								<li>
									<a class="active" id="balanceo-work-in-progress" data-toggle="tab" href="#balance-work-in-progress" >All Transaction</a>
								</li>
								{{-- <li>
									<a  id="balanceo-pending" data-toggle="tab" href="#balance-pending" >Invoices</a>
								</li>
								<li>
									<a  id="balanceo-available" data-toggle="tab" href="#balance-available" >Milestones</a>
								</li>
								<li>
									<a  id="balanceo-contracts" data-toggle="tab" href="#balance-contracts" >Pending Funds</a>
								</li> --}}
							</ul>
							<div class="ml-auto">
								{{-- <a href="" class="grren-btn">Export</a> --}}
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
									{{-- <div class="d-flex short-table-css overflow-fix">
										<p>Short</p>
										<select  class="project-filter-select">
											<option >10</option>
											<option >20</option>
											<option >50</option>
										</select>
									</div> --}}
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
										  	@if(sizeof($withdrawPayment)>0)
										  	@foreach($withdrawPayment as $payment)
												<tr>
												  <td>{{ date('d-M-Y', strtotime($payment->created_at)) }}</td>
												  <td>{{ $payment->project->p_title }}</td>
												  <th><a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></th>
												  <th>${{ $payment->freelancer_payment }} (USD)</th>
												  <th>${{ $payment->freelancer_payment }} (USD)</th>
												</tr>
											@endforeach
											@else
												<tr>
													<td style="text-align: center;" colspan="5">No Data found yet !</td>
												</tr>
											@endif
											</tbody>
										</table>
									</div>
							    </div>
								{{-- <div class="tab-pane fade" id="balance-pending" role="tabpanel">
									<div class="weekly-timesheet-clander overflow-fix d-flex padding-to">
										<p>Week of:</p>
										<input type="text" id="datepicker2"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
										<h6>To</h6>
										<input type="text" id="datepicker3"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
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
											  <th>Project Name</th>
											  <th>Invoice Ref</th>
											  <th>Invoice Amount</th>
											  <th>Unpaid Amount</th>
											  <th>Status</th>
											  <th>Actions</th>
											</tr>
										  </thead>
										  <tbody>
												<tr>
												  <td>Children's book illustrator needed</td>
												 <td>GAP-123456</td>
												  <th>$420 (USD)</th>
												  <th>$350 (USD)</th>
												  <th></th>
												  <th></th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="balance-available" role="tabpanel">
									<br/>
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
											  <th>Created Date</th>
											  <th>Project Name</th>
											  <th>Amount</th>
											  <th>Description</th>
											  <th>Status</th>
											  <th>Actions</th>
											</tr>
										  </thead>
										  <tbody>
												<tr>
												  <td>25 Sep 2017</td>
												  <td>Children's book illustrator needed</td>
												  <th>$420 (USD)</th>
												  <th></th>
												  <th></th>
												  <th></th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="balance-contracts" role="tabpanel">
									<div class="weekly-timesheet-clander overflow-fix d-flex padding-to">
										<p>Week of:</p>
										<input type="text" id="datepicker4"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
										<h6>To</h6>
										<input type="text" id="datepicker5"><h5><i class="fa fa-calendar" aria-hidden="true"/></i></h5>
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
											  <th> Date</th>
											  <th>Transaction</th>
											  <th>Reason</th>
											  <th>Currency</th>
											  <th>Amount</th>
											  <th>Expected time of resolution</th>
											</tr>
										  </thead>
										  <tbody>
												<tr>
												  <td>25 Sep 2017</td>
												  <td></td>
												  <th></th>
												  <th>Usd</th>
												  <th>$420 (USD)</th>
												  <th></th>
												</tr>
											</tbody>
										</table>
									</div>
								</div> --}}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End balance-overview -->
@endsection