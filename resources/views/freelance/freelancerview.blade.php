@extends('layouts.main')

@section('content')
<!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
				@include( 'project.fadvancesearch')
				</div>
				<div class="all-search-porject-count-area overflow-fix">
					<p>{{ $fcount }} Profiles</p>
				</div>
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
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="project-filter-area overflow-fix">
						  <select id="project-filter" class="project-filter-select showfree">
						  		<option value="">--Select--</option>
								<option value="0">Top Reated Porfile</option>
								@foreach($procat as $pro)
								 <option value="{{ $pro->id }}">{{ $pro->project_cat }}</option>
								@endforeach
						  </select>
					</div>
					{{-- <div class="post-button">
						<a href="{{ url('signup') }}" class="grren-btn">Create a Profile</a>
					</div> --}}
				</div>
				<div class="single-profile-item box-white-bg overflow-fix catshow">
					@foreach($freelancers as $free)
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-2">	
								<div class="single-profile-item-img overflow-fix">
									<a href=""><img src="{{ asset('app_images/resize_images') }}/{{ $free->p_image }}"/></a>
								</div>
							</div>
							<div class="col-lg-8">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<a href="{{ url('freelancer-profile', $free->user_idu) }}"><h2>{{ $free->name }}</h2></a>
										<ul>
											<li><a href="">{{ $free->hourly_rate }}$/hr</a></li>
											<li><a href="">{{ $free->experience }} Year</a></li>
											<li>
												<div class="profile-simple-rating d-flex">
													@for($star=1; $star<=5; $star++)
														@if($free->ratingf >= $star)
														<i class="fa fa-star" aria-hidden="true"></i>
														@elseif(strpos($free->ratingf,'.'))
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														@else
														<i class="fa fa-star-o" aria-hidden="true"></i>
														@endif
													@endfor
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6>{{ $free->designation }}</h6>
									</div>
									<div class="single-profile-datalist overflow-fix">
									{{ str_limit(strip_tags($free->overview), 300) }}
							            @if (strlen(strip_tags($free->overview)) > 300)
							              ... <a href="{{ url('freelancer-profile', $free->user_idu) }}" class="">Read More</a>
							            @endif
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>{{ $free->skill }},</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="{{ url('freelancer-profile', $free->user_idu) }}" class="grren-btn">View Profile</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="pagination-area overflow-fix">
					<div class="pagi">
						{!! $freelancers->links(); !!}	
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')

<script type="text/javascript">
	
	$(document).ready(function() {
		
		searchFreelancer();

		$('.showfree').change(function()  {
	        var catID = $(this).val();
	        if(catID) {
	            $.ajax({
	                url: '/greatneighbor/getCategory/'+catID,
	                type: "GET",
	                data: {
		               'catID':catID,
		             },
	                dataType: "html",
	                success:function(data) {
	                    $('.catshow').html(data);
	                }
	            });
	        }else{
	             $('.catshow').empty();
	        }
	    });

// start change state then will be change zipcode

	     $('.schange').on('change', function()  {
            var state = $(this).val();
            if(state) {
                $.ajax({
                    url: '/getSchange/'+state,
                    type: "GET",
                    data: {
		               'state':state,
		             },
                    dataType: "json",
                    success:function(data) {
                        $('select[name="zipcode"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="zipcode"]').append('<option value="'+ value +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="zipcode"]').empty();
            }
        });

		$('.ragecha').change(function() {
			var ravalue = $(this).val();
			if(ravalue){
				$("#setrange").attr("value", ravalue);
			}
		});

	});

	function searchFreelancer(){
         $('#category').change(function(){
            var category = $(this).val();
            var state = $('#state').val();
            var zipcode = $('#zipcode').val();
            var range = $('#range').val();
            var skill = $('#skill').val();
            getSearchFreelancer(category,state,zipcode,range,skill);
         });
         $('#state').change(function(){
            var zipcode = $('#zipcode').val();
            var category = $('#category').val();
            var range = $('#range').val();
            var skill = $('#skill').val();
            var state = $(this).val();
            getSearchFreelancer(category,state,zipcode,range,skill);
         });
         $('#zipcode').change(function(){
            var zipcode = $(this).val();
            var category = $('#category').val();
            var range = $('#range').val();
            var skill = $('#skill').val();
            var state = $('#state').val();
            getSearchFreelancer(category,state,zipcode,range,skill);
         });
         $('#range').change(function(){
            var range = $(this).val();
            var zipcode = $('#zipcode').val();
            var category = $('#category').val();
            var skill = $('#skill').val();
            var state = $('#state').val();
            getSearchFreelancer(category,state,zipcode,range,skill);
         });
         $('#skill').keyup(function(){
            var range = $('#range').val();
            var zipcode = $('#zipcode').val();
            var category = $('#category').val();
            var skill = $(this).val();
            var state = $('#state').val();
            getSearchFreelancer(category,state,zipcode,range,skill);
         });
    }

     function getSearchFreelancer(category,state,zipcode,range,skill){

         $.ajax({
            url :'{{URL::to('/getfreeSearch')}}',
            type: "get",
            data: {
               'category':category,
               'state':state,
               'zipcode':zipcode,
               'range':range,
               'skill':skill,
            },
            success: function(data){
               $('.catshow').html(data);
               //console.log(data);
            }
         });
      }

</script>

@endsection