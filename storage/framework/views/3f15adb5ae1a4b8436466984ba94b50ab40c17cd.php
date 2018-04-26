<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav flex-column pl-1">
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Project Category ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('project-category.create')); ?>">Add Project Category</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('project-category.index')); ?>">All Project Category</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Job Level ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('job-level.create')); ?>">Add Job Level</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('job-level.index')); ?>">All Job Level</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">Rate Type ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu3" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('rate-type.create')); ?>">Add Rate Type</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('rate-type.index')); ?>">All Rate Type</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu9" data-toggle="collapse" data-target="#submenu9">Payment History ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu9" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('freelancer.payment.admin.show')); ?>">Freelance Payment</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('freelancer.withdraw.admin.show')); ?>">Freelancer Withdraw</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu4" data-toggle="collapse" data-target="#submenu4">Skill Category ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu4" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('skill-category.create')); ?>">Add Skill Category</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('skill-category.index')); ?>">All Skill Category</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu6" data-toggle="collapse" data-target="#submenu6">Users ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu6" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('users.create')); ?>">Add User</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('users.index')); ?>">All User</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('roles.index')); ?>">Role</a></li>
            </ul>
          </li>
           <li class="nav-item">
              <a class="nav-link" href="#submenu7" data-toggle="collapse" data-target="#submenu7">Permission ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu7" aria-expanded="false">
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('permissions.create')); ?>">Add Permission</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('permissions.index')); ?>">All Permission</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#submenu8" data-toggle="collapse" data-target="#submenu8">General Setting ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu8" aria-expanded="false">
              
              <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('gsetting.index')); ?>">All General Setting</a></li>
               <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('servicefee.create')); ?>">Add Service Fee</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::route('servicefee.index')); ?>">All Service Fee</a></li>
            </ul>
          </li>
        </ul>
      </div>

