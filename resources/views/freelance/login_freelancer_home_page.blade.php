@extends('layouts.main')
@section('content')
<!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
					@include( 'project.padvancesearch')
				</div>
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
					<p>{{ $count }} projects for you</p>
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
					<div class="project-filter-area overflow-fix">
						  <select id="project-filter" class="project-filter-select showtype">
								<option value="">--Select--</option>
								<option value="0">Newest project first</option>
								@foreach($rate as $r)
								<option value="{{ $r->id }}">{{ $r->project_type }}</option>
								@endforeach
						  </select>
					</div>
				</div>
				<div id="porject-list-full-area" class="overflow-fix showrate">
					@foreach($jobpost as $post)
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
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
										<h6> {{ $post->ratetype->project_type }} - {{ $post->joblevel->job_level }} Level ($$) - Est. Time: {{ $post->p_less }} - <span>Posted {{ CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() }} ago<span></h6>
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
									<a href="{{ url('project-details', $post->id) }}" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				
				<div class="pagination-area overflow-fix">
					<div class="pagi">
					<ul>
						{!! $jobpost->links(); !!}	
					</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-list-area -->

@endsection

@section('script')

<script type="text/javascript">
	$(document).ready(function() {

		projectSearch();
		
		$('.showtype').change(function()  {
	        var ratype = $(this).val();
	        if(ratype) {
	            $.ajax({
	                url: '/greatneighbor/getrateType/'+ratype,
	                type: "GET",
	                data: {
		               'ratype':ratype,
		             },
	                dataType: "html",
	                success:function(data) {
	                    $('.showrate').html(data);
	                }
	            });
	        }else{
	             $('.showrate').empty();
	        }
	    });

	    $('.range').change(function() {
	    	var range = $(this).val();
	    	if(range){
	    		$('.setrange').attr('value', range);
	    	}
	    });
	});

	function projectSearch(){
		$('#category').change(function() {
			var category = $(this).val();
			var discription = $('#discription').val();
			var type = $('#type').val();
			var budget = $('#budget').val();
			var skill = $("#skill").val();
			getSearchproject(category,discription,type,budget,skill);
		});

		$('#discription').keyup(function() {
			var discription = $(this).val();
			var category = $('#category').val();
			var type = $('#type').val();
			var budget = $('#budget').val();
			var skill = $("#skill").val();
			getSearchproject(category,discription,type,budget,skill);
		});

		$('#type').change(function() {
			var type = $(this).val();
			var category = $('#category').val();
			var discription = $('#discription').val();
			var budget = $('#budget').val();
			var skill = $("#skill").val();
			getSearchproject(category,discription,type,budget,skill);
		});

		$('#budget').change(function() {
			var budget = $(this).val();
			var category = $("#category").val();
			var discription = $('#discription').val();
			var type = $('#type').val();
			var skill = $("#skill").val();
			getSearchproject(category,discription,type,budget,skill);
		});

		$('#skill').keyup(function() {
			var skill = $(this).val();
			var category = $("#category").val();
			var discription = $('#discription').val();
			var type = $('#type').val();
			var budget = $('#budget').val();
			var skill = $("#skill").val();
			getSearchproject(category,discription,type,budget,skill);
		});
	}

	function getSearchproject(category,discription,type,budget,skill) {
		//console.log(category,discription,type,budget,skill);
		$.ajax({
			url:'{{ URL::to('/getProjectsearchf') }}',
			type: "get",
			data: {
				'category':category,
				'discription':discription,
				'type':type,
				'budget':budget,
				'skill':skill,
			},
			success: function(data) {
				$('.showrate').html(data);
			}
		});
	} 

</script>

@endsection
