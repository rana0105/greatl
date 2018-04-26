@extends('layouts.main')

@section('content')
<section class="main-project-details-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="project-details-title overflow-fix">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
						<h2>{{ $project->p_title }}</h2>
						<span>Posted {{ Carbon::parse($project->created_at)->diffForHumans() }}</span>
					</div>
					<div class="project-details-skil overflow-fix">
						<ul class="d-flex justify-content-start">
							<li>{{ $project->projectcat->project_cat }}</li>
						</ul>
					</div>
					<div class="project-details-type overflow-fix d-flex justify-content-start">
						<ul>
							<li>{{ $project->ratetype->project_type }}</li>
							<li>{{ $project->p_buddget }}</li>
						</ul>
						<ul>
							<li>{{ $project->joblevel->job_level }}</li>
							<li>Level</li>
						</ul>
						<ul>
							<li>Project Start</li>
							<li>{{ date('d, M, Y', strtotime($project->p_sdate)) }}</li>
						</ul>
					</div>
					<div class="project-details-conetnt overflow-fix">
						<h2 class="project-details-conetnt-title">Details</h2>
						<div class="project-details-attachment overflow-fix">
							{!!  $project->p_description !!}
						</div>
						<div class="project-details-attachment overflow-fix">
							<ul>
								@foreach($project->clienfile as $cf)
								<li><a href="{{ asset('app_images/resize_images') }}/{{ $cf->c_file }}" target="blank"> <i class="fa fa-paperclip" aria-hidden="true"></i>{{ $cf->c_file }} ﬁle here</a></li>
							@endforeach
							</ul>
						</div>
					</div>
					<div class="project-edit drop">
						<input type="hidden" name="c_id_post" value="{{ Auth::user()->id }}">
						{{-- @if($project->status >= 3)
						<a href="{{ route('project.payment', $project) }}">Pay Now</a>
						@endif
						<a href="{{ url('post-edit', $project->id) }}">Edit Job</a>
						<a href="{{ route('payment.history', $project) }}">Payment</a>
						<a href="{{ url('hire-complete', $project) }}">Hire Complete</a>
						<a href="{{ url('project-decline', $project) }}">Decline</a> --}}

						<div class="dropdown project">
						  <button class="btn btn-hirecheck dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    @if($project->status >= 3)
							<a href="{{ route('project.payment', $project) }}">Pay Now</a>
							@endif
							<a href="{{ url('post-edit', $project->id) }}">Edit Job</a>
							<a href="{{ route('payment.history', $project) }}">Payment</a>
							<a href="{{ url('hire-complete', $project) }}">Hire Complete</a>
							<a href="{{ url('project-decline', $project) }}">Decline</a>
						  </div>
						</div>
					</div>
				</div>
				<div class="project-details-bit-area overflow-fix box-white-bg">
					<div class="page-highlight overflow-fix">
						<h2>{{ $project->jobapply()->count() }} freelancers bid on this project</h2>
						@if(session('success-hired'))
							<div class="alert alert-success">
								{{ session('success-hired') }}
							</div>
						@endif
					</div>
					@if($project->jobapply == null)
						<h3>Any freelancer didn't apply this job!</h3>
					@else
						@foreach($project->jobapply as $apply)
						<div class="single-profile-item overflow-fix box-white-bg">
							<div class="row padding-o">
								<div class="col-lg-2">	
									<div class="single-profile-item-img overflow-fix">
										<a href=""><img src="{{ asset('app_images/resize_images/'.$apply->jobapplyfree->freelencer->p_image) }}"></a>
									</div>
								</div>
								<div class="col-lg-8">	
									<div class="single-profile-single-item overflow-fix">
										<div class="single-profile-heading overflow-fix">
											<a href="{{ url('freelancer-profile', $apply->jobapplyfree->id) }}"><h2>{{ $apply->jobapplyfree->name }}</h2></a>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php $ratingAvg = $apply->jobapplyfree->freelancerRating->avg('ratingf'); ?>
													@for($star=1; $star<=5; $star++)
														@if($ratingAvg >= $star)
														<i class="fa fa-star" aria-hidden="true"></i>
														@elseif(strpos($ratingAvg,'.'))
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														@else
														<i class="fa fa-star-o" aria-hidden="true"></i>
														@endif
													@endfor
												</div>
											
											</li>
										</div>
										<div class="single-profile-subject overflow-fix">
											<h6>{{ $apply->freelencer->designation }}</h6>
										</div>
										<div class="single-profile-datalist overflow-fix">
											{{ $apply->coverletter }}<a href="#">more</a>
										</div>
									</div>
								</div>
								<div class="col-lg-2 d-flex align-items-end">
									<div class="applyerInfoInClient see-dtiles-button overflow-fix">
										<a href="{{ route('client.freelancer.profile', $apply->jobapplyfree) }}" class="grren-btn">View Profile</a>
										<a href="{{ route('project.message.show',[$project, $apply->jobapplyfree->id]) }}" class="grren-btn">Message</a>
										@if($apply->job_apply_status == 1)
										<form class="overflow-fix form-btn " action="{{ route('project.cancel.freelancer', $apply->id) }}" method="post">
											{{csrf_field()}}
											<input type="hidden" name="jobpost_id" value="{{ $project->id }}">
											<input type="hidden" name="freelancer_id" value="{{ $apply->jobapplyfree->id }}">
											<button type="submit" class="grren-btn">Cancel</button>
										</form>
										@elseif($apply->job_apply_status == 2)
										<a href="#" class="red-btn">Removed</a>
										@else
										<form class="overflow-fix form-btn " action="{{ route('apply.hire', $apply->id) }}" method="post">
											{{csrf_field()}}
											<button type="submit" class="grren-btn">Hire</button>
										</form>
										@endif
										<a href="{{ route('freereview', [$project->id, $apply->jobapplyfree->id]) }}" class="grren-btn">Review</a>
										<input type="hidden" name="free_idr" value="{{ $apply->jobapplyfree->id }}">
									</div>
								</div>
							</div>
							<div class="row justify-content-end application-list-bid-ammount margin-o">
								<div class="col-10">
									<p>Bid Amount:<span> ${{ $apply->bidamount }} USD</span></p>
								</div>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('style')
<style>
	.btn-hirecheck {
		background: #0d9b49;
		color: #ffffff;
	}

	.project-edit.drop a {
	    background: #0d9b49;
	    display: block;	
	    font-size: 12px;
	    width: 70%;
	    margin-top: 8px;
	    text-align: center;
	    box-shadow: 0px 0px 5px 0px #0000002e;
	    color: #ecf0f1;
	    padding: 1px 0px 1px 0px;
	    }
</style>
@endsection