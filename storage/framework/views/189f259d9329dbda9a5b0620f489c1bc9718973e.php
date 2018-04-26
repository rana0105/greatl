<div class="advance-sraech-area overflow-fix box-white-bg overflow-fix d-flex justify-content-between">
	<div class="search-single-field">
		<h2>Category</h2>
		<select id="category" class="project-categories">
			<option value="">Select</option>
			<option value="0">All Category</option>
			<?php $__currentLoopData = $procat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->project_cat); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>
	<div class="search-single-field">
		<h2>Sates</h2>
		<select id="state" class="project-categories schange">
		  <option value="">Select</option>
		  <?php $__currentLoopData = config('state.states'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($state['name']); ?>"><?php echo e($state['name']); ?></option>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>
	<div class="search-single-field">	
		<h2>Zip Code</h2>
		<select id="zipcode" class="project-categories" name="zipcode">
			<option value="" selected="selected">Select</option>
		</select>
		
	</div>
	<div class="search-single-field">
		<h2>Budget</h2>
		<div class="range-slider-wrap">
			<input type="text" id="range" class="range-slider range-slider--single ragecha" name="" value="" />
			<input type="hidden" id="setrange" name="range" value="">
		</div>
	</div>
	<div class="search-single-field">
		<h2>Your Skill</h2>
		<input id="skill" placeholder="Type and enter" name="skill" value="" type="text"/>
	</div>
</div>