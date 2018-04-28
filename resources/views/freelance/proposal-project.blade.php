@extends('layouts.main')
@section('content')
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
									  @foreach($apply as $ap)
											<tr>
											  <td><a href="{{ url('project-details', $ap->job_post_id ) }}">{{ $ap->postjob->p_title }}</a></td>
											  <td>{{ $ap->bid }}</td>
											  <th>${{ $ap->bidamount }} (USD)</th>
											  <th>${{ $ap->avg }} (USD)</th>
											  <th>{{ date('d M, Y', strtotime($ap->postjob->p_edate)) }}</th>
											  <th>
											  	<div class="dropdown show">
											  		<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 Select
												  </a>
												  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
														
														
															<a class="dropdown-item" href="{{ route('jobapplydelete', $ap->id) }}"
						                                    onclick="event.preventDefault();
						                                             document.getElementById('app-delete').submit();">
						                                    <i class="glyphicon glyphicon-log-out"></i> Cancel Bid
						                                </a>

						                                <form id="app-delete" action="{{ route('jobapplydelete', $ap->id) }}" method="POST" style="display: none;">
						                                    {{ csrf_field() }}
						                                </form>
													</div>
												   </div>
											  </th>
											</tr>
										@endforeach
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
									  	@foreach($apply as $ap)
											<tr>
											  <td><a href="{{ url('project-details', $ap->job_post_id ) }}">{{ $ap->postjob->p_title }}</a></td>
											  <td>{{ $ap->bid }}</td>
											  <th>${{ $ap->bidamount }} (USD)</th>
											  <th>{{ date('d M, Y', strtotime($ap->postjob->p_edate)) }}</th>
											  <th>
												<div class="dropdown show">
											  		<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 Select
												  </a>
												  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
													<a class="dropdown-item" href="{{ route('complete', $ap->id) }}">
					                                    Complete Work
					                                </a>
                          							<a class="dropdown-item" href="{{ url('project/'.$ap->job_post_id.'/message') }}">
					                                    Send Message
					                                </a>
                          							<a class="dropdown-item" href="{{ route('review', $ap->id) }}">
					                                    Send Review
					                                </a>

													<a class="dropdown-item" href="{{ route('freelancer.payment.history', $ap->id) }}">
					                                    Payment
					                                </a>
												</div>
											   </div>
											  </th>
											</tr>
											@endforeach
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
									  	@foreach($apply as $ap)
											<tr>
											  <td><a href="{{ url('project-details', $ap->job_post_id ) }}">{{ $ap->postjob->p_title }}</a></td>
											  <td>{{ $ap->bid }}</td>
											  <th>${{ $ap->bidamount }} (USD)</th>
											  <th>{{ date('d M, Y', strtotime($ap->postjob->p_sdate)) }} <br/>to {{ date('d M, Y', strtotime($ap->postjob->p_edate)) }}</th>
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
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="balance-contracts" role="tabpanel">
								<div class="balance-overview-available overflow-fix">
									@foreach($apply as $ap)
									<p class="all-job-style">
										<a href="{{ url('project-details', $ap->job_post_id ) }}">{{ $ap->postjob->p_title }}</a>
									</p>
									@endforeach
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
@section('style')
<style type="text/css">
	element.style {
    position: absolute;
    top: 0px;
    left: 0px;
    will-change: transform;
    transform: translate3d(119px, 64px, 0px);
}
</style>
@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection