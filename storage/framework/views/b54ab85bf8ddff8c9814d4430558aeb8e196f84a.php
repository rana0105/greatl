

<?php $__env->startSection('content'); ?>
<!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
				<?php echo $__env->make( 'project.fadvancesearch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
				<div class="all-search-porject-count-area overflow-fix">
					<p><?php echo e($fcount); ?> Profiles</p>
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
								<?php $__currentLoopData = $procat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								 <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->project_cat); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </select>
					</div>
					
				</div>
				<div class="single-profile-item box-white-bg overflow-fix catshow">
					<?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $free): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="single-profile-item box-white-bg overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-2">	
								<div class="single-profile-item-img overflow-fix">
									<a href=""><img src="<?php echo e(asset('app_images/resize_images')); ?>/<?php echo e($free->p_image); ?>"/></a>
								</div>
							</div>
							<div class="col-lg-8">	
								<div class="single-profile-single-item overflow-fix">
									<div class="single-profile-heading overflow-fix d-flex justify-content-start">
										<a href="<?php echo e(url('freelancer-profile', $free->user_idu)); ?>"><h2><?php echo e($free->name); ?></h2></a>
										<ul>
											<li><a href=""><?php echo e($free->hourly_rate); ?>$/hr</a></li>
											<li><a href=""><?php echo e($free->experience); ?> Year</a></li>
											<li>
												<div class="profile-simple-rating d-flex">
													<?php for($star=1; $star<=5; $star++): ?>
														<?php if($free->ratingf >= $star): ?>
														<i class="fa fa-star" aria-hidden="true"></i>
														<?php elseif(strpos($free->ratingf,'.')): ?>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<?php else: ?>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<?php endif; ?>
													<?php endfor; ?>
												</div>
											</li>
										</ul>
									</div>
									<div class="single-profile-subject overflow-fix">
										<h6><?php echo e($free->designation); ?></h6>
									</div>
									<div class="single-profile-datalist overflow-fix">
									<?php echo e(str_limit(strip_tags($free->overview), 300)); ?>

							            <?php if(strlen(strip_tags($free->overview)) > 300): ?>
							              ... <a href="<?php echo e(url('freelancer-profile', $free->user_idu)); ?>" class="">Read More</a>
							            <?php endif; ?>
									</div>
									<div class="single-profile-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i><?php echo e($free->skill); ?>,</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="<?php echo e(url('freelancer-profile', $free->user_idu)); ?>" class="grren-btn">View Profile</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="pagination-area overflow-fix">
					<div class="pagi">
						<?php echo $freelancers->links();; ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

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
            url :'<?php echo e(URL::to('/getfreeSearch')); ?>',
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>