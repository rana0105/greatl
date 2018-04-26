@extends('layouts.main')

@section('content')
<!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="all-search-porject-count-area overflow-fix">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					@if(session('warning'))
						<div class="alert alert-danger">
							{{ session('warning') }}
						</div>
					@endif
					<?php $cpcount = $clientpost->count(); ?>
						@if(!isset($status))
							<p>{{ $cpcount }} projects post by you</p>
						@else
							@if($status == config('project.reverseStatus.1'))
							<p>{{ $cpcount }} projects payment for work</p>
							@elseif($status == config('project.reverseStatus.2'))
							<p>{{ $cpcount }} projects for hire freelancer</p>
							@elseif($status == config('project.reverseStatus.3'))
							<p>{{ $cpcount }} projects complete for you</p>
							@else
							@endif
						@endif
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-search-area -->
<!-- project-list-area -->
<section class="project-list-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight overflow-fix">
						<h2>Your Project</h2>
					</div>
					<div class="post-button">
						<a href="{{ url('project-post') }}" class="grren-btn">Post a Project</a>
					</div>
				</div>
				@foreach($clientpost as $post)
				<div class="single-porject-area overflow-fix">
					<div class="row padding-o">
						<div class="col-lg-10">
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
									<h6> {{ $post->ratetype->project_type }} - {{ $post->joblevel->job_level }} Level ($$) - Est. Time: {{ $post->p_less }} - <span>Posted {{ CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() }} <span></h6>
								</div>
								<div class="single-porject-datalist overflow-fix">
									{{ str_limit(strip_tags($post->p_description), 300) }}
						            @if (strlen(strip_tags($post->p_description)) > 300)
						              ... <a href="{{ url('job-applicant-list', $post->id) }}" class="">Read More</a>
						            @endif
								</div>
								<div class="single-porject-skill overflow-fix">
									<p>Skills:</p>
									<ul>
										<li><i>{{ $post->p_jobskill }},</i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-2 d-flex align-items-center">
							<div class="see-dtiles-button overflow-fix">
								<input type="hidden" name="c_id_post" value="{{ Auth::user()->id }}">
								<a href="{{ url('client-project-details', $post->id) }}" class="grren-btn">Job Details</a>
							</div> </br>
						</div>
					</div>
					<div class="single-porject-count-hits overflow-fix">
						<ul class="d-flex justify-content-start">
							{{-- <li><span>View:</span><span>49</span></li> --}}
							<li><a href="{{ url('client-project-details', $post->id) }}" class="grren-list"><span>Total Apppicant:</span><span>{{ $post->jobapply->count() }}</span></a></li>
							{{-- <li><span>Interviewer:</span><span>4</span></li> --}}
							@if($post->status == 0)
							<li><span>Status:</span><span class="text-primary">Available Project</span></li>
							@elseif($post->status == 2)
							<li><span>Status:</span><span class="text-warning">Hiring Process</span></li>
							@elseif($post->status == 3)
							<li><span>Status:</span><span class="green-text">Complete Project</span></li>
							@else
							<li><span>Status:</span><span class="text-secondery">Active Project</span></li>
							@endif
						</ul>
					</div>
				</div>
				@endforeach
				<div class="pagination-area overflow-fix">
					<ul>
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li><a href="">6</a></li>
						<li><a href="">7</a></li>
						<li><a href="">8</a></li>
						<li><a href="">9</a></li>
						<li><a href="">10</a></li>
						<li><a href="">>></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-list-area -->

@endsection