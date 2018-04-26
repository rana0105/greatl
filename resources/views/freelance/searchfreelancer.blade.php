@extends('layouts.main')

@section('content')
<!-- project-search-area -->
<section class="section-title-new  overflow-fix">
   <div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h3>{{ sizeof($freelancers) }} Freelancers profile!</h3>
   			</div>
   		</div>
   </div>
</section>
<!-- End project-search-area -->


<!-- Profile-Search-area -->
<section class="profile-item-area overflow-fix  content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="single-profile-item box-white-bg overflow-fix catshow">
					@foreach($freelancers as $key => $free)
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-2">	
								<div class="single-profile-item-img overflow-fix">
									<a href=""><img src="{{ asset('app_images/resize_images') }}/{{ $free['p_image'] }}"/></a>
								</div>
							</div>
							<div class="col-lg-8">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<a href="{{ url('freelancer-profile', $free['user_idu']) }}"><h2>{{ $free['name'] }}</h2></a>
										<ul>
											<li><a href="">{{ $free['hourly_rate' ]}}$/hr</a></li>
											<li><a href="">{{ $free['experience'] }}</a></li>
											<li>
												<div class="profile-simple-rating d-flex">
													@for($star=1; $star<=5; $star++)
														@if($free->ratingf >= $star)
														<i class="fa fa-star" aria-hidden="true"></i>
														@else
														<i class="fa fa-star-o" aria-hidden="true"></i>
														@endif
													@endfor
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6>{{ $free['designation'] }}</h6>
									</div>
									<div class="single-profile-datalist overflow-fix">
									{{ str_limit(strip_tags($free['overview']), 300) }}
							            @if (strlen(strip_tags($free['overview'])) > 300)
							              ... <a href="{{ url('freelancer-profile', $free['user_idu']) }}" class="">Read More</a>
							            @endif
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>{{ $free['skill'] }},</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="{{ url('freelancer-profile', $free['user_idu']) }}" class="grren-btn">View Profile</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="pagination-area overflow-fix">
					<div class="pagi">
						{{-- {!! $freelancers->links(); !!}	 --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection