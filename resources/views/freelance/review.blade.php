@extends('layouts.main')
@section('content')
<!-- give-feedback  -->
<section class="give-feedback-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="give-feedback overflow-fix">
					<div class="give-feedback-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Give Feedback From Freelancer</h2>
						</div>
					</div>
					
					{{-- <div class="single-profile-heading overflow-fix freelancer-rating-text">
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
								</div>
							</li>
							<li>{{ $rating , 'out of 5' }}</li>
						</ul>
					</div> --}}
					<div class="give-feedback-content overflow-fix box-white-bg padding-to">
						<h2>Rate this work</h2>
						<form class="row overflow-fix " action="{{ url('review') }}" method="POST">
							{{ csrf_field() }}
							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif
							<input type="hidden" name="job_post_id" value="{{ $jreview->id }}">
						<input type="hidden" name="jobapply_id" value="{{ $jreview->id }}">
						<input type="hidden" name="user_id" value="{{ $jreview->user_id }}">
						<input type="hidden" name="freelancer_id" value="{{ $jreview->freelancer_id }}">
						<div class="daynamic-rating overflow-fix">
							<div class="stars overflow-fix">
								<input type="radio" name="star" value="1" class="star-1" id="star-1">
								<label class="star-1" for="star-1">1</label>
								<input type="radio" name="star" value="2" class="star-2" id="star-2">
								<label class="star-2" for="star-2">2</label>
								<input type="radio" name="star" value="3" class="star-3" id="star-3">
								<label class="star-3" for="star-3">3</label>
								<input type="radio" name="star" value="4" class="star-4" id="star-4">
								<label class="star-4" for="star-4">4</label>
								<input type="radio" name="star" value="5" class="star-5" id="star-5">
								<label class="star-5" for="star-5">5</label>
								<span></span>
							</div>
						</div>
						
							<div class="col-lg-2 col-md-2 col-md-2 col-sm-2">
								
							</div>
							<div class="col-lg-8 col-md-8 col-md-8 col-sm-8">
								<div class="give-feedback-text overflow-fix">
									<textarea name="description" placeholder="Write Something..."></textarea>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-md-2 col-sm-2 d-flex align-items-end padding-o">
								<div class="give-feedback-button overflow-fix">
									<button type="submit">submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End message-box -->
@endsection