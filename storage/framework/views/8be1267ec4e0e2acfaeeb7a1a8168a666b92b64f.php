
<?php $__env->startSection('content'); ?>
    <section class="home-banner-slider-area overflow-fix">
      <div class="banner-silder owl-carousel owl-theme">
        <div class="banner-silder-single-item-area overflow-fix" style="background:url(images/slide1.jpg);">
          <div class="container my-container">
            <div class="row">
              <div class="col-lg-6">
                <div class="banner-silder-single-item overflow-fix">
                  <div class="banner-silder-single-item-heading overflow-fix">
                    <h2>Hire expert freelancers for your job, online</h2>
                  </div>
                  <div class="banner-silder-single-item-content overflow-fix">
                    Millions of small businesses use freelance jobs on Freelancer to turn their ideas into reality.
                    <br/>
                    <br/>
                    Freelancers for thousands of jobs from web design, mobile app development, product design to manufacturing 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-silder-single-item-area overflow-fix" style="background:url(images/slide1.jpg);">
          <div class="container my-container">
            <div class="row">
              <div class="col-lg-6">
                <div class="banner-silder-single-item overflow-fix">
                  <div class="banner-silder-single-item-heading overflow-fix">
                    <h2>Hire expert freelancers for your job, online</h2>
                  </div>
                  <div class="banner-silder-single-item-content overflow-fix">
                    Millions of small businesses use freelance jobs on Freelancer to turn their ideas into reality.
                    <br/>
                    <br/>
                    Freelancers for thousands of jobs from web design, mobile app development, product design to manufacturing 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-silder-single-item-area overflow-fix" style="background:url(images/slide1.jpg);">
          <div class="container my-container">
            <div class="row">
              <div class="col-lg-6">
                <div class="banner-silder-single-item overflow-fix">
                  <div class="banner-silder-single-item-heading overflow-fix">
                    <h2>Hire expert freelancers for your job, online</h2>
                  </div>
                  <div class="banner-silder-single-item-content overflow-fix">
                    Millions of small businesses use freelance jobs on Freelancer to turn their ideas into reality.
                    <br/>
                    <br/>
                    Freelancers for thousands of jobs from web design, mobile app development, product design to manufacturing 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-silder-single-item-area overflow-fix" style="background:url(images/slide1.jpg);">
          <div class="container my-container">
            <div class="row">
              <div class="col-lg-6">
                <div class="banner-silder-single-item overflow-fix">
                  <div class="banner-silder-single-item-heading overflow-fix">
                    <h2>Hire expert freelancers for your job, online</h2>
                  </div>
                  <div class="banner-silder-single-item-content overflow-fix">
                    Millions of small businesses use freelance jobs on Freelancer to turn their ideas into reality.
                    <br/>
                    <br/>
                    Freelancers for thousands of jobs from web design, mobile app development, product design to manufacturing 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="see-succeess-freelancers-area overflow-fix">
      <div class="container my-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="see-succeess-freelancers overflow-fix">
              <div class="see-succeess-freelancers-heading overflow-fix">
                <h2>See Success Freelancers</h2>
              </div>
              <div class="succeess-freelancers overflow-fix d-flex align-items-end justify-content-center">
                <?php if(sizeof($freelancers) > 0): ?>
                <?php $className = ['one','two','three','two four','one five']; $i = 0; ?>
                  <?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="succeess-freelancers-single-item <?php echo e($className[$i++]); ?> overflow-fix">
                      <div class="succeess-freelancers-single-img overflow-fix">  
                        <img src="<?php echo e(asset('app_images/resize_images/'.$freelancer->p_image)); ?>"/>
                      </div>
                      <div class="succeess-freelancers-single-datils overflow-fix">
                        <div class="succeess-freelancers-single-heading overflow-fix">  
                          <h2>
                            <a href=""><?php echo e($freelancer->name); ?></a>
                          </h2>
                          <h3><?php echo e($freelancer->experience); ?> years</h3>
                          <p><?php echo e($freelancer->designation); ?></p>
                        </div>
                        <div class="succeess-freelancers-single-tag overflow-fix">  
                          <ul>
                            <?php if($freelancer->skill != null): ?>
                              <?php $__currentLoopData = explode(',', $freelancer->skill); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="#"><?php echo e($skill); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="started-in-minutes-area overflow-fix">
      <div class="container my-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="started-in-minutes-heading overflow-fix">
              <h2>Get Started in minutes</h2>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="started-in-minutes-single-area overflow-fix"> 
              <div class="started-in-minutes-single-img overflow-fix">
                <a href=""><img src="<?php echo e(asset('images/hire1.jpg')); ?>"/></a>
              </div>
              <div class="started-in-minutes-single-heading overflow-fix">
                <h2>I want to hire</h2>
                <p>Get the perfect freelancer for your budget from great neighbour.</p>
              </div>
              <div class="started-in-minutes-single-button overflow-fix">
                <a href="<?php echo e(url('register')); ?>" class="grren-btn">Get Started Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="started-in-minutes-single-area overflow-fix"> 
              <div class="started-in-minutes-single-img overflow-fix">
                <a href=""><img src="<?php echo e(asset('images/work1.jpg')); ?>"/></a>
              </div>
              <div class="started-in-minutes-single-heading overflow-fix">
                <h2>I want to work</h2>
                <p>Do you want to earn money, find unlimited clients and build your freelance career?</p>
              </div>
              <div class="started-in-minutes-single-button overflow-fix">
                <a href="<?php echo e(url('register')); ?>" class="grren-btn">Join Now</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <section class="mini-about-area overflow-fix">
      <div class="container my-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="mini-about-heading overflow-fix">
              <h2>Join with the growing community solutions for your business.<br>
                Find services based on your goals.
               </h2>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="mini-about-single-area overflow-fix d-flex">  
              <div class="mini-about-single-icon overflow-fix"> 
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
              </div>
              <div class="mini-about-single-conetnt  align-self-end overflow-fix">
                <h5><?php echo e(App\Model\JobPost::count()); ?></h5>
                <p>Projects</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="mini-about-single-area overflow-fix d-flex">  
              <div class="mini-about-single-icon overflow-fix"> 
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="mini-about-single-conetnt  align-self-end overflow-fix">  
                <h5><?php echo e(App\User::count()); ?></h5>
                <p>User</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="mini-about-single-area overflow-fix d-flex">  
              <div class="mini-about-single-icon overflow-fix"> 
                <i class="fa fa-briefcase" aria-hidden="true"></i>
              </div>
              <div class="mini-about-single-conetnt  align-self-end overflow-fix">  
                <h5><?php echo e(App\User::where('role_idg', 2)->count()); ?></h5>
                <p>Client</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="mini-about-single-area overflow-fix d-flex">  
              <div class="mini-about-single-icon overflow-fix"> 
                <i class="fa fa-user-md" aria-hidden="true"></i>
              </div>
              <div class="mini-about-single-conetnt  align-self-end overflow-fix">  
                <h5><?php echo e(App\User::where('role_idg', 3)->count()); ?></h5>
                <p>Freelancer</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <section class="main-also-featured-area overflow-fix">
      <div class="container my-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="also-featured-area overflow-fix">
              <div class="also-featured-heading overflow-fix">
                <h2>We’re also featured in</h2>
              </div>
              <div class="also-featured owl-carousel owl-theme overflow-fix">
                <div class="also-featured-single-item overflow-fix">
                  <div class="also-featured-single-img overflow-fix d-flex align-items-center"> 
                    <img src="images/client1.png"/>
                  </div>
                </div>
                <div class="also-featured-single-item overflow-fix">
                  <div class="also-featured-single-img overflow-fix d-flex align-items-center"> 
                    <img src="images/client2.png"/>
                  </div>
                </div>
                <div class="also-featured-single-item overflow-fix">
                  <div class="also-featured-single-img overflow-fix d-flex align-items-center"> 
                    <img src="images/client3.png"/>
                  </div>
                </div>
                <div class="also-featured-single-item overflow-fix">
                  <div class="also-featured-single-img overflow-fix d-flex align-items-center"> 
                    <img src="images/client4.png"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="city-bg-area overflow-fix">
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>