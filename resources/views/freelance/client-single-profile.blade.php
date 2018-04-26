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
									<a href=""><img src="{{ asset('app_images/resize_images') }}/{{ $sprofile->p_image }}"></a>
								</div>
							</div>
							<div class="col-lg-9 padding-o">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<a href="#"><h2>{{ $sprofile->name }}</h2></a>
									</div>
									
									<div class="single-profile-heading overflow-fix freelancer-rating-text">
										<ul>
											<li>
												<div class="profile-simple-rating d-flex">
													@for($star=1; $star<=5; $star++)
														@if($rating >= $star)
														<i class="fa fa-star" aria-hidden="true"></i>
														@else
														<i class="fa fa-star-o" aria-hidden="true"></i>
														@endif
													@endfor
													@if($rating != 0)	
													&nbsp; {{ $rating }} {{ 'out of 5' }}
													@else
													&nbsp; {{ '0 out of 5' }}
													@endif	
												</div>
											</li>
										</ul>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="project-details-similar-area overflow-fix">
					<h2 class="project-details-similar-title-area">Work History and Feedback</h2>
					<main class="new-posgress-updat overflow-fix">
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6>Sep 2017 - Present<span style="margin-left:20px;">Job in progress</span></h6>
							<ul>
								<li>26 hours</li>
								<li>$22.22 / hr</li>
								<li>$581.48 Spent</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6 class="new-proj-sound overflow-fix">
								<span>Sep 2017 - Present</span>
								<span class="new-proj-raing" style="margin-left:20px;">
									<div class="profile-simple-rating d-flex">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star rating-neg" aria-hidden="true"></i>
										<span style="margin-left:10px;">4</span>
									</div>
								</span>
							</h6>
							<ul>
								<li>$200 Spent</li>
								<li>Fixed Price</li>
							</ul>
							<div class="feed-backfrom-client overflow-fix">
								Excellent work on the design, hope to hire you again.
							</div>
						</div>
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6 class="new-proj-sound overflow-fix">
								<span>Sep 2017 - Present</span>
								<span class="new-proj-raing" style="margin-left:20px;">
									<p>No feedback given</p>
								</span>
							</h6>
							<ul>
								<li>$200 Spent</li>
								<li>Fixed Price</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6>Sep 2017 - Present<span style="margin-left:20px;">Job in progress</span></h6>
							<ul>
								<li>26 hours</li>
								<li>$22.22 / hr</li>
								<li>$581.48 Spent</li>
							</ul>
						</div>
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6 class="new-proj-sound overflow-fix">
								<span>Sep 2017 - Present</span>
								<span class="new-proj-raing" style="margin-left:20px;">
									<div class="profile-simple-rating d-flex">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star rating-neg" aria-hidden="true"></i>
										<span style="margin-left:10px;">4</span>
									</div>
								</span>
							</h6>
							<ul>
								<li>$200 Spent</li>
								<li>Fixed Price</li>
							</ul>
							<div class="feed-backfrom-client overflow-fix">
								Excellent work on the design, hope to hire you again.
							</div>
						</div>
						<div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
							<h2><a href="#">Small Wordpress website design using existing logos and color charts</a></h2>
							<h6 class="new-proj-sound overflow-fix">
								<span>Sep 2017 - Present</span>
								<span class="new-proj-raing" style="margin-left:20px;">
									<p>No feedback given</p>
								</span>
							</h6>
							<ul>
								<li>$200 Spent</li>
								<li>Fixed Price</li>
							</ul>
						</div>
						
						
						{{-- <div class="load-more-area-new overflow-fix">
							<button>Load More</button>
						</div> --}}
					</main>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="project-details-sidebar-area overflow-fix">
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<ul class="d-flex justify-content-between">
							<li>Total Project:</li>
							<li>{{ $jobcount }}</li>
						</ul>
						{{-- <ul class="d-flex justify-content-between">
							<li>Active Project:</li>
							<li>2</li>
						</ul> --}}
						<ul class="d-flex justify-content-between">
							<li>Total Spent:</li>
							<li>$ {{ $spent }}</li>
						</ul>
						{{-- <ul class="d-flex justify-content-between">
							<li>Total Hires:</li>
							<li>26</li>
						</ul> --}}
						{{-- <ul class="d-flex justify-content-between">
							<li>Avg hourly rate paid</li>
							<li>$10.5/hr</li>
						</ul> --}}
					</div>
					<div class="project-details-single-sidebar overflow-fix  box-white-bg">
						@foreach($lang as $la)
						<ul class="d-flex justify-content-between">
							<li>{{ $la->language }}:</li>
							<li>{{ $la->proficiency }}</li>
						</ul>
						@endforeach
					</div>
					
					{{-- <div class="project-details-single-sidebar overflow-fix  box-white-bg">
						<h5><img src="images/shield.png"/>Payment Veriﬁed</h5>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('style')
<style type="text/css">
	.new-posgress-updat .project-details-similar-single-area {
    width: 48%;
    margin: 5px 5px;
    min-height: 160px;
    padding: 10px;
    max-height: 160px;
    overflow: hidden;
}
.new-proj-sound span p {
    font-size: 10px;
}
.new-posgress-updat button {
    min-width: 120px;
    padding: 7px 5px;
    display: block;
    margin: 0 auto;
    margin-top: 14px;
    clear: both;
    background: #0d9b49;
    border: 0;
    color: #fff;
    cursor: pointer;
    border-radius: 2px;
}
.profile-simple-rating i{
    font-size: 10px;
    display: block;
    line-height: 15px;
    color: #f8c835;
}
.new-proj-sound span {
    float: left;
}
.feed-backfrom-client {
    border-top: 1px solid #acacac38;
    margin-top: 10px;
    padding-top: 10px;
}
</style>
@endsection