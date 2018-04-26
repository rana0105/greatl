@extends('layouts.main')

@section('content')
   <!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
					@include('project.advancesearch')
				</div>
				<div class="all-search-porject-count-area overflow-fix">
					<p>1245 projects for you</p>
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
						  <select id="project-filter" class="project-filter-select showproject">
								<option value="">Newest project first</option>
								@foreach($rate as $r)
								<option value="{{ $r->id }}">{{ $r->project_type }}</option>
								@endforeach
						  </select>
					</div>
					{{-- @can('view_posts') --}}
					<div class="post-button">
						<a href="{{ url('project-post') }}" class="grren-btn">project-post</a>
					</div>
					{{-- @endcan --}}
				</div>
				<div id="porject-list-full-area" class="overflow-fix show">
					@foreach($projects as $pro)
					<div class="single-porject-area mix overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>{{ $pro->p_title }}</h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> {{ $pro->ratetype->project_type }} - {{ $pro->joblevel->job_level }} Level ($$) - Est. Time: {{ $pro->p_less }} - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 {{ substr($pro->p_description, 0, 300) }} {{ strlen($pro->p_description) >300 ? "..." :""}}<a href="{{ url('project-details', $pro->id) }}">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>{{ $pro->p_jobskill }},</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="{{ url('project-details', $pro->id) }}" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				
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

@section('script')

<script type="text/javascript">
	$(document).ready(function() {
		

		$('.showproject').change(function()  {
	        var rtype = $(this).val();
	        if(rtype) {
	            $.ajax({
	                url: '/greatneighbor/getType/'+rtype,
	                type: "GET",
	                //dataType: "json",
	                dataType: "html",
	                success:function(data) {
	                	alert(data);
	                   // console.log(data);
	                    $('.show').html(data);
	                }
	            });
	        }else{
	             $('.show').empty();
	        }
	    });
	});

</script>

@endsection