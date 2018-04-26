<!-- Header -->
<header class="main-header-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header-logo overflow-fix">
					<a href="{{ url('dashboard') }}"><img src="images/logo.png" alt=""></a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="header-search-bar overflow-fix">
					<form>
						
					</form>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="client-menu-right overflow-fix d-flex justify-content-end">
					<ul>
						<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
					</ul>
					<div class="profile-menu-ara d-flex">
						<div class="profile-menu-img align-self-center">
							<a href="#"><img src="images/profile-image-use.png"/></a>
						</div>
						<div class="profile-menu-name align-self-center">
							<a href="#"><p>Admin...</p></a>
						</div>
						<div class="profile-menu-icon align-self-center">
							<div class="dropdown show">
							  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								 <i class="fa fa-bars" aria-hidden="true"></i>
							  </a>
							  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="#">Profile Setting</a>
								<a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
								<a class="dropdown-item" href="#">{{ Auth::user()->roles->pluck('name')->first() }}</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon-log-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
							  </div>
							</div>
						</div>
					</div>
					
				</div>                    
			</div>
		</div>
	</div>
</header>
<!-- End Header -->