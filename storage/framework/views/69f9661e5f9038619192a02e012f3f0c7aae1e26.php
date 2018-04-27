
<?php $__env->startSection('content'); ?>
<!-- client-project-post-page-area -->
<section class="project-post-page-area overflow-fix content-bg apply-this-job-area ">
	<div class="container my-container">
		<div class="row">
			<form class="col-lg-12" role="form" action="<?php echo e(url('apply-job', $post)); ?>" method="POST" enctype="multipart/form-data" files="true">
				<?php echo e(csrf_field()); ?>

				
				<input type="hidden" name="free_id" value="<?php echo e(Auth::user()->id); ?>">
				
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight overflow-fix">
						<h2>Apply This Job</h2>
					</div>
				</div>
				<div class="project-details-area overflow-fix  box-white-bg">
					<div class="project-details-title overflow-fix">
						<h2><?php echo e($post->p_title); ?></h2>
					</div>
					<div class="project-details-skil overflow-fix">
						<ul class="d-flex justify-content-start">
							<li><?php echo e($post->projectcat->project_cat); ?></li>
						</ul>
					</div>
					<div class="project-details-type overflow-fix d-flex justify-content-start">
						<ul>
							<li><?php echo e($post->ratetype->project_type); ?></li>
							<li><?php echo e($post->p_buddget); ?></li>
						</ul>
						<ul>
							<li><?php echo e($post->joblevel->job_level); ?></li>
							<li>Level</li>
						</ul>
						<ul>
							<li>Project Start</li>
							<li><?php echo e(date('d M, Y', strtotime($post->p_sdate))); ?></li>
						</ul>
					</div>
					<div class="view-job-details-link-area overflow-fix">
						<a  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View Job Details</a>
						<div class="collapse" id="collapseExample">
						  <div class="card card-body">
							<?php echo $post->p_description; ?>

						  </div>
						</div>
						
						
					</div>
				</div>
				<div class="project-post-budget-info-area overflow-fix  box-white-bg">
					<h2>Payment Terms</h2>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Bid Amount</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<span>$</span>
							<input type="number" class="bidamount" name="bidamount" placeholder="00.00" />
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Client’s budget: $<?php echo e($post->p_buddget); ?> USD</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Great Neighbour Service Fee</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<span>$</span>
							<input type="number" class="servicefee" name="servicefee" readonly="" value="<?php echo e($fee->servicefee); ?>" />
							
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>You’ll be paid</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<span>$</span>
							<input type="text" class="getpaid" name="getpaid" placeholder="00.00" readonly="" />
							
						</div>
					</div>
					<div class="project-post-single-input project-post-single-time overflow-fix">
						<h2>How long time you need</h2>
						<div class="search-single-field">
							<select class="project-time" name="taketime">
								<option value="Less than 1 week">Less than 1 week</option>
								<option value="Less than 2 week">Less than 2 week</option>
								<option value="Less than 3 week">Less than 3 week</option>
								<option value="Less than 1 month">Less than 1 month</option>
								<option value="More than 1 month">More than 1 month</option>
							</select>
						</div>
					</div>
				</div>
				<div class="project-post-attachment-area project-apply-attachment-area overflow-fix  box-white-bg">
					<h2>Additional Information</h2>
					<h6>Cover Letter</h6>
					<textarea name="coverletter" placeholder="Cover Letter ......" required=""></textarea>
					
					<h2>Attachment (Optional)</h2>
					<div class="project-post-fileupload-btn overflow-fix">
						<input id="upload-input" type="file" name="a_file[]" class="upload" multiple="multiple" name="browsefile"/>
						<span>Drag or Upload Files</span>	
						<div id="file-upload-name"></div>    
					</div>
					<p>You may attach up to 10 files under the size of 25MB each. Include work samples or other documents to support your application. Do not attach your résumé — your Upwork profile is automatically forwarded to the client with your proposal. </p>
				</div>
				
				<div class="project-post-submit-btn-area overflow-fix">
					<button type="submit" class="grren-btn">Apply Now</button>
					<a href="">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- client-project-post-page-area -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		feecalculation();

		$(document).on('click','.file-remove',function(){
			$(this).parents('.file-remove-icon').remove();

		})
		document.getElementById('upload-input').onchange = uploadOnChange;
		    
		function uploadOnChange() {
		    var filename = this.value;
		    var lastIndex = filename.lastIndexOf("\\");
		    if (lastIndex >= 0) {
		        filename = filename.substring(lastIndex + 1);
		    }
		    var files = $('#upload-input')[0].files;
		    for (var i = 0; i < files.length; i++) {
		     $("#file-upload-name").append('<div class="file-remove-icon">'+files[i].name+'<b class="file-remove">x</b></div>');
		    }
		}
	});

	function feecalculation() {
		$('.bidamount').keyup(function(){
			var input = $(this).val();
			var servicefee = $('.servicefee').val();
			var result = 0;
			var percent = (servicefee/100)*input;
			result = input - percent;
			$('.getpaid').val(result);
		});
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>