@extends('layouts.main')
@section('content')
<!-- Balance-overview  -->
<section class="balance-overview-area overflow-fix content-bg proposal-project-area freelancer-weekly-timesheet">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="balance-overview-title overflow-fix">
					<div class="page-highlight overflow-fix">
						<h2>Weekly Timesheet</h2>
					</div>
				</div>
				<div class="weekly-timesheet-clander overflow-fix d-flex padding-to">
					<p>Week of:</p>
					<span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
					<input type="text" id="datepicker"><h5><i class="fa fa-calendar" aria-hidden="true"></i></h5>
					<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				</div>
				<div class="weekly-timesheet-date overflow-fix padding-to">
					<p>Freelancer:<span>Freelancer full name</span></p>
					<p>Period:<span> 02 Oct 2017 - 08 Oct 2017</span></p>
				</div>
				<div class="balance-overview-conetnt box-white-bg overflow-fix">
					<div class="balance-overview-tab-content overflow-fix">
						<div class="tab-content">
						    <div class="tab-pane fade show active" id="balance-work-in-progress" role="tabpanel">
								<div class="balance-overview-if-work overflow-fix padding-to">
									<table class="table table-bordered table-hover table-responsive margin-o">
									  <thead>
										<tr>
										  <th>Clietn</th>
										  <th>Bid</th>
										  <th>My Bid</th>
										  <th>Avg Bid</th>
										  <th>End Date</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
											<tr>
											  <td><a href="6.1-Freelancer-Profile-Single.php">Clietn</a></td>
											  <td>24</td>
											  <th>$420 (USD)</th>
											  <th>$350 (USD)</th>
											  <th>in 6 days</th>
											  <th>
												  <select  class="project-filter-select">
														<option >Select</option>
														<option >Cancel Bid</option>
														<option >Edit Bid</option>
												   </select>
											  </th>
											</tr>
										</tbody>
									</table>
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