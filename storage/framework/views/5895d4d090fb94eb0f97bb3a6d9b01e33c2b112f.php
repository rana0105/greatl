

<?php $__env->startSection('content'); ?>

<!-- client-project-post-page-area -->
<section class="project-post-page-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<form class="col-lg-12" action="<?php echo e(url('post-updated', $post->id)); ?>" method="POST" enctype="multipart/form-data" files="true">
				<?php echo e(csrf_field()); ?>

				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight overflow-fix">
						<h2>Project</h2>
					</div>
				</div>
				<div class="project-post-basic-info-area overflow-fix box-white-bg">
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Name/Title:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_title" value="<?php echo e($post->p_title); ?>" />
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Enter meaningful project name to easily find out your project. For example "Website Design & Development"</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Category:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<?php echo e(Form::select('p_category_id', $projectcat , $post->p_category_id, ["class" => 'project-categories'])); ?>

							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify project category to easily categorize the project.</p> 
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Description:</p>
						</div>
						<div class="project-post-input-area overflow-fix full-width">
							<textarea name="p_description" value=""><?php echo $post->p_description; ?>  </textarea>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Clearly describe your project requirements to easily understand what Freelancer will have to do. Any types of contact info are not allowed in requirement details. You can communicate with Freelancers on your project message board.</p>
						</div>
					</div>
				</div>
				<div class="project-post-additional-info-area overflow-fix  box-white-bg">
					<h2>Additional Information</h2>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Job Level</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<?php echo e(Form::select('p_joblevel_id', $level , $post->p_joblevel_id, ["class" => 'project-categories'])); ?>

							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Which level freelancer do this job?</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Required Skills:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<ul class="required-skills-list">
								
							</ul>
							<input name="p_jobskill" class="required-skills" data-role="tagsinput" value="<?php echo e($post->p_jobskill); ?>" type="text"/>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify required skills that are relevant to this project. Multiple Skills are allowed to select at a time.</p>
						</div>
					</div>
					
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Start Time:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input  type="text" name="p_sdate" id="datepicker" value="<?php echo e($post->p_sdate); ?>">
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify when you start this project?</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Deadline:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input  type="text" name="p_edate" id="datepicker6" value="<?php echo e($post->p_edate); ?>">
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify how many days do you need to complete this project?</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Projet Est. Time:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_less" value="<?php echo e($post->p_less); ?>" />
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>For example "Less than 1 week, Less than 10 hrs/week"</p>
						</div>
					</div>
				</div>
				<div class="project-post-budget-info-area overflow-fix  box-white-bg">
					<h2>Budget</h2>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Rate Type:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<?php echo e(Form::select('p_ratetype_id', $rate , $post->p_ratetype_id, ["class" => 'project-categories'])); ?>

							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Small project can be done “fixed price”. & Large project can be done “hourly rate”.</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Budget:($)</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input name="p_buddget"  value="<?php echo e($post->p_buddget); ?>" type="text"/>
						</div>
					</div>
				</div>
				<div class="project-post-attachment-area overflow-fix  box-white-bg">
					<div class="project-details-attachment overflow-fix">
						<ul>
						<?php $__currentLoopData = $cfile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href=""> <i class="fa fa-paperclip" aria-hidden="true"></i><?php echo e($cf->c_file); ?> here</a><span>x</span></li>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					
					<h2>Attachment (Optional)</h2>
					<div class="project-post-fileupload-btn overflow-fix">
						<input  placeholder="" id="upload-input" type="file" class="upload" multiple="multiple" name="p_file[]" value="" />
						<span>Drag or Upload Files</span>	
						<div id="file-upload-name">
						</div>    
					</div>
					<p>You may attach up to 10 files under the size of 25MB each. Include work samples or other documents to support your application. Do not attach your résumé — your Upwork profile is automatically forwarded to the client with your proposal. </p>
				</div>
				
				<div class="project-post-submit-btn-area overflow-fix  ">
					<button type="submit" class="grren-btn">Update</button>
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
	tinymce.init({ selector:'textarea' });

	$( document ).ready(function() {

		// file upload name

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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>