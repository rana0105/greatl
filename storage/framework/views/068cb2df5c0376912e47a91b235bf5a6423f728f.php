
<nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
      <a class="navbar-brand mb-1" href="<?php echo e(route('dashboard')); ?>">Great Neighbor</a>
      <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav">
      <?php if(Auth::check()): ?>
        
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ml-auto">
      <?php if(Auth::guest()): ?>
          <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
          <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
      <?php else: ?>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
                <img class="img-circle" src="<?php echo e(asset('images/profile-img.png')); ?>">
                <?php echo e(Auth::user()->name); ?>

                <span class="label label-success"><?php echo e(Auth::user()->roles->pluck('name')->first()); ?></span>
               
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="glyphicon glyphicon-log-out"></i> Logout
                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            </ul>
            
        </li>
        <?php endif; ?>
      </ul>
    </div>
</nav>