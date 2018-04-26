

<?php $__env->startSection('content'); ?>
   <!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
					<?php echo $__env->make('project.padvancesearch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
				<div class="all-search-porject-count-area overflow-fix">
					<?php if(session('success')): ?>
						<div class="alert alert-success">
							<?php echo e(session('success')); ?>

						</div>
					<?php endif; ?>
					<?php if(session('warning')): ?>
						<div class="alert alert-danger">
							<?php echo e(session('warning')); ?>

						</div>
					<?php endif; ?>
					<p><?php echo e($projects->count()); ?> projects for you</p>
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
						  		<option value="">--Select--</option>
								<option value="0">Newest project first</option>
								<?php $__currentLoopData = $rate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($r->id); ?>"><?php echo e($r->project_type); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </select>
					</div>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts')): ?>
					<div class="post-button">
						<a href="<?php echo e(url('project-post')); ?>" class="grren-btn">project-post</a>
					</div>
					<?php endif; ?>
				</div>
				<div id="porject-list-full-area" class="overflow-fix showlog">
					<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="single-porject-area mix overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2><?php echo e($pro->p_title); ?></h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<?php
										$second = Carbon::parse($pro->created_at)->diffInSeconds($new);
									      $dt = Carbon::now('Asia/Dhaka');
									      $days = $dt->diffInDays($dt->copy()->addSeconds($second));
									      $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
									      $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));
										?>
										<h6> <?php echo e($pro->ratetype->project_type); ?> - <?php echo e($pro->joblevel->job_level); ?> Level ($$) - Est. Time: <?php echo e($pro->p_less); ?> - <span>Posted <?php echo e(CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans()); ?> ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 <?php echo substr(strip_tags($pro->p_description), 0, 300); ?> <?php echo strlen(strip_tags($pro->p_description)) >300 ? "..." :""; ?><a href="<?php echo e(url('project-details', $pro->id)); ?>">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i><?php echo e($pro->p_jobskill); ?>,</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="<?php echo e(url('project-details', $pro->id)); ?>" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				
				<div class="pagination-area overflow-fix">
					<div class="pagi">
						<?php echo $projects->links();; ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-list-area -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
	$(document).ready(function() {

		projectSearch();
		

		$('.showproject').change(function()  {
	        var rtype = $(this).val();
	        if(rtype) {
	            $.ajax({
	                url: '/getType/'+rtype,
	                type: "GET",
	                data: {
		               'rtype':rtype,
		             },
	                dataType: "html",
	                success:function(data) {
	                    $('.showlog').html(data);
	                }
	            });
	        }else{
	             $('.showlog').empty();
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
			url:'<?php echo e(URL::to('/getProjectsearch')); ?>',
			type: "get",
			data: {
				'category':category,
				'discription':discription,
				'type':type,
				'budget':budget,
				'skill':skill,
			},
			success: function(data) {
				$('.showlog').html(data);
			}
		});
	} 

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>