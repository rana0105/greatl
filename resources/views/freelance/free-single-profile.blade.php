@extends('layouts.main')
@section('content')
<!-- project-details-area -->
<section class="main-project-details-area overflow-fix freelancers-profile-area  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-8">
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-3">	
								<div class="single-profile-item-img overflow-fix">
									<a href="#"><img src="{{ asset('app_images/resize_images') }}/{{ $freelencerProfile->freelencer->p_image }}"></a>
								</div>
							</div>
							<div class="col-lg-9 padding-o">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<h2>{{ $freelencerProfile->name }}</h2>
										<online-status :user="{{ $freelencerProfile->id }}"></online-status>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6>{{ $freelencerProfile->freelencer->designation }}</h6>
									</div>
									<div class="single-profile-heading overflow-fix freelancer-rating-text">
										<ul>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php $ratingAvg = $freelencerProfile->freelancerRating->avg('ratingf'); ?>
													@for($star=1; $star<=5; $star++)
														@if($ratingAvg >= $star)
														<i class="fa fa-star" aria-hidden="true"></i>
														@elseif(strpos($ratingAvg,'.'))
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														@else
														<i class="fa fa-star-o" aria-hidden="true"></i>
														@endif
													@endfor
													@if($ratingAvg != 0)	
													&nbsp; {{ round($ratingAvg,1) }} {{ 'out of 5' }}
													@else
													&nbsp; {{ '0 out of 5' }}
													@endif	
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>{{ $freelencerProfile->freelencer->skill }},</i></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="project-details-conetnt overflow-fix">
						<h2 class="project-details-conetnt-title">Overview</h2>
						<div class="project-details-attachment overflow-fix">
							{{ $freelencerProfile->freelencer->overview }}
						</div>
					</div>
				</div>
				
				<div class="project-details-similar-area overflow-fix">
					<h2 class="project-details-similar-title-area">Work History and Feedback</h2>
					<div  class="row blog masonry">
						@foreach($feedbacks as $feedback)
					  	<div class="col-md-6 project-details-similar-single-area post overflow-fix">
							<h2><a href="{{ url('project-details', $feedback->jobTitle->id ) }}">{{ $feedback->jobTitle->p_title }}</a></h2>
							<ul>
								<li>Earned: ${{ $feedback->freelancerFeedback->getpaid }} USD</li>
								<li>Rating:
									@for($star=1; $star<=5; $star++)
										@if($feedback->ratingf >= $star)
										<i class="fa fa-star" aria-hidden="true"></i>
										@elseif(strpos($feedback->ratingf,'.'))
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
										@else
										<i class="fa fa-star-o" aria-hidden="true"></i>
										@endif
									@endfor
									@if($feedback->ratingf != 0)	
									&nbsp; {{ round($feedback->ratingf,1) }} {{ 'out of 5' }}
									@else
									&nbsp; {{ '0 out of 5' }}
									@endif
								</li>
								<li>Comment: {{ $feedback->descriptionf }}</li>
							</ul>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="project-details-sidebar-area overflow-fix">
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<ul class="d-flex justify-content-between">
							<li>Hourly Rate:</li>
							<li>$ {{ $freelencerProfile->freelencer->hourly_rate }}</li>
						</ul>
						<ul class="d-flex justify-content-between">
							<li>Experience</li>
							<li>{{ $freelencerProfile->freelencer->experience }} Year</li>
						</ul>
						{{-- <ul class="d-flex justify-content-between">
							<li>Project Worked:</li>
							<li>3</li>
						</ul>
						<ul class="d-flex justify-content-between">
							<li>Total Hour:</li>
							<li>26</li>
						</ul>
						<ul class="d-flex justify-content-between">
							<li>Total earned:</li>
							<li>$981.48</li>
						</ul> --}}
						<ul class="d-flex justify-content-between">
							<li>Availability:</li>
							<li>{{ $freelencerProfile->freelencer->availability }}</li>
						</ul>
					</div>
					{{-- {{ dd($freelencerProfile->language) }} --}}
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
					@foreach($freelencerProfile->freelencer->language as $la)
						<ul class="d-flex justify-content-between">
							<li>{{ $la->language }}:</li>
							<li>{{ $la->proficiency }}</li>
						</ul>
					@endforeach
					</div>
					<div class="project-details-single-sidebar-textarea overflow-fix">
						{{-- <h2 class="project-details-single-sidebar-textarea overflow-fix">To discuss your project with Johny<br>Laurents sign up</h2> --}}
						<div class="project-details-single-sidebar overflow-fix box-white-bg">
							{{-- <h2>Name</h2>
							<input type="text"placeholder="Name"/>
							<h2>Email</h2>
							<input type="rmail"placeholder="Name"/> --}}
							<h2>Message</h2>
							<textarea placeholder=""></textarea>
							<button type="submit">Sent</button>
						</div>
					</div>
					{{-- <div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<h5><img src="{{ asset('images/shield.png') }}"/>Payment Veriﬁed</h5>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-details-area -->
@endsection

