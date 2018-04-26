@extends('layouts.main')
@section('content')
<!-- project-list-area -->
<section class="project-list-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight overflow-fix">
						<h2>Project</h2>
					</div>
				</div>
				<div class="single-porject-area overflow-fix">
					<div class="row padding-o">
						<div class="col-lg-12">
							<div class="single-porject-single-item overflow-fix">
								<div class="single-porject-heading overflow-fix">
									<h2>{{ $post->p_title }}</h2>
								</div>
								<div class="single-porject-type overflow-fix">
									<?php
									$second = Carbon::parse($post->created_at)->diffInSeconds($new);
								      $dt = Carbon::now('Asia/Dhaka');
								      $days = $dt->diffInDays($dt->copy()->addSeconds($second));
								      $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
								      $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));
									?>
									<h6> {{ $post->ratetype->project_type }} - {{ $post->joblevel->job_level }} Level ($$) - Est. Time: {{ $post->p_less }} - <span>Posted {{ CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() }} ago<span></h6>
								</div>
								<div class="single-porject-datalist overflow-fix">
									 {{ substr($post->p_description, 0, 300) }} {{ strlen($post->p_description) >300 ? "..." :""}}<a href="#">more</a>
								</div>
								<div class="single-porject-skill overflow-fix">
									<p>Skills:</p>
									<ul>
										<li><i>{{ $post->p_jobskill }},</i></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="application-list-area overflow-fix box-white-bg">
					<h2 class="application-list-count">Applicant List <span>:- {{ $bid }}</span></h2>
					@if($aplist->count() > 0)
					@foreach($aplist as $list)
					<div class="single-profile-item overflow-fix box-white-bg">
						<div class="row padding-o">
							<div class="col-lg-2">	
								<div class="single-profile-item-img overflow-fix">
									<a href=""><img src="{{ asset('app_images/resize_images') }}/{{ $list->p_image }}"></a>
								</div>
							</div>
							<div class="col-lg-8">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix">
										<a href="{{ url('freelancer-profile', $list->freelancer_id) }}"><h2>{{ $list->name }}</h2></a>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6>{{ $list->designation }}</h6>
									</div>
									<div class="single-profile-datalist overflow-fix">
										{{ $list->coverletter }}<a href="#">more</a>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-end">
								<div class="see-dtiles-button overflow-fix">
									<a href="{{ url('freelancer-profile', $list->freelancer_id) }}" class="grren-btn">View Profile</a>
									<a href="#" class="grren-btn">Message</a>
									<a href="#" class="grren-btn">Hire</a>
									<a href="{{ route('freereview', $post->id ) }}" class="grren-btn">Review</a>
									<input type="hidden" name="free_idr" value="{{ $list->freelancer_id }}">
								</div>
							</div>
						</div>
						<div class="row justify-content-end application-list-bid-ammount margin-o">
							<div class="col-10">
								<p>Bid Amount:<span> ${{ $list->bidamount }} USD</span></p>
							</div>
						</div>
					</div>
					@endforeach
					@else
						<div class="alert alert-warning">No One Apply for this project Yet</div>
					@endif
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-list-area -->
@endsection