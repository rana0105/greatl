<!-- Header -->
<header class="main-header-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header-logo overflow-fix">
					<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt=""></a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="header-search-bar overflow-fix">
					<form action="<?php echo e(route('search')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

						<div class="search-field-opacity">
							<i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-angle-down" aria-hidden="true"></i>
							<select id="headerselect" class="header-search asearch" >
							  <option value="">--Select--</option>
							  <option value="project">Find Projcet</option>
							  <option value="freelancer">Find Freelancer</option>
							</select>
						</div>
						<input type="hidden" id="current" name="geolocation" value="">
						<input type="hidden" class="search-input" id="setvalue" name="setvalue" value="allpf">
						<input type="text" id="setkey" name="search_input" class="search-input"  placeholder="Find your write choice!"/>
						<input type="button" name="" class="input-filed-none">
					</form>
				</div>
			</div>
			<?php if(Auth::guest()): ?>
			<div class="col-lg-6">
				<div class="right-menu overflow-fix">
					<ul class="header-menu overflow-fix">
						<li class="active"><a href="<?php echo e(url('public-projects')); ?>">Projects</a></li>
						<li><a href="<?php echo e(url('public-freelancers')); ?>">Freelancers</a></li>
						<li><a href="<?php echo e(url('register')); ?>">Signup</a></li>
						<li><a href="<?php echo e(url('login')); ?>">Login</a></li>
					</ul>
				</div>              
			</div>
			<?php endif; ?>
		</div>
	</div>
</header>
<!-- End Header -->