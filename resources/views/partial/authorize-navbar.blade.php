<!-- Header -->
<header class="main-header-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header-logo overflow-fix">
					<a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="header-search-bar overflow-fix">
					<form action="{{ route('searchlogin') }}" method="POST">
					{{ csrf_field() }}
						<div class="search-field-opacity">
							<i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-angle-down" aria-hidden="true"></i>
							<select id="headerselect" class="header-search asearch" >
							  <option value=""></option>
							  <option value="project">Find Projcet</option>
							  <option value="freelancer">Find Freelancer</option>
							</select>
						</div>
						<input type="hidden" id="current" name="geolocation" value=""/>
						<input type="hidden" class="search-input" id="setvalue" name="setvalue" value="allpf"/>
						<input type="text" id="setkey" name="search_input" class="search-input"  placeholder="Find your write choice!"/>
						<input type="button" name="" class="input-filed-none"/>
					</form>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="client-menu-right overflow-fix d-flex justify-content-end">
					<ul class="" id="app">
					@can('view_project')
					    <li class="active"><a href="{{ route('freelance') }}">Freelancers</a></li>
						<li>
							<div class="dropdown">
							  <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								My Project
							  </a>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  	<a class="dropdown-item" href="{{ route('client') }}">All Project</a>
								<a class="dropdown-item active" href="{{ route('client.filter', config('project.reverseStatus.1') ) }}">Active Project</a>
								<a class="dropdown-item" href="{{ route('client.filter', config('project.reverseStatus.2') ) }}">Hiring Project</a>
								<a class="dropdown-item" href="{{ route('client.filter', config('project.reverseStatus.3') ) }}">Complete Project</a>
							  </div>
							</div>
						</li>
					@endcan
					@can('view_work')
						<li class="active"><a href="{{ route('projec') }}">Projects</a></li>
						<li class=""><a href="{{ url('proposal-project', Auth::user()->id) }}">
									My Work
								<input type="hidden" name="postid" value="{{ App\Model\JobApply::all('job_post_id') }}">
								</a></li>	
						{{-- <li>
							<div class="dropdown">
							  <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									My Work
							  </a>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="{{ url('proposal-project', Auth::user()->id) }}">
									Work History
								<input type="hidden" name="postid" value="{{ App\Model\JobApply::all('job_post_id') }}">
								</a>
							  </div>
							</div>
						</li> --}}
					@endcan
						<li>
							<div class="dropdown">
							  <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Reports
							  </a>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								{{-- <a class="dropdown-item" href="{{ url('freelancer-weekly-timesheet') }}">Weekly Timesheet</a> --}}
								<a class="dropdown-item" href="{{ url('freelancer-transaction-history') }}">Transaction History</a>
							  </div>
							</div>
						</li>
						<li>
							<div class="dropdown">
							  <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Balance
							  </a>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="{{ url('balance-overview') }}">Overview</a>
								<a class="dropdown-item" href="{{ url('balance-withdraw') }}">Withdraw</a>
								<a class="dropdown-item" href="{{ url('payment-method') }}">Payment Method</a>
							  </div>
							</div>
						</li>
						@include('partial.notification.chat')
						<li class="mail-notifi hidenoti" id="markas" onclick="markAsRead()">
							<info-notifications
								:user="{{json_encode([
									'id'   => Auth::user()->id,
									'role' => Auth::user()->role_idg,
									])}}"
							></info-notifications>
						</li>

					</ul>
					<?php $profileImage = Auth::user()->profilePic ? Auth::user()->profilePic->p_image : 'fakeprofile.png' ?>
					<div class="profile-menu-ara d-flex">
						<div class="profile-menu-img align-self-center">
							@if($profileImage == null)
							<a href="#"><img src="{{ asset('app_images/resize_images/fakeprofile.png')}}" class="rounded-circle"/></a>
							@else
							<a href="#"><img src="{{ asset('app_images/resize_images'.'/'.$profileImage)}}" class="rounded-circle"/></a>
							@endif
						</div>&nbsp;&nbsp;
						<div class="profile-menu-icon align-self-center">
							<div class="dropdown show">
								  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 <i class="fa fa-bars" aria-hidden="true"></i>
								  </a>
								  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
								@if(Auth::user()->role_idg == 2)
									<a class="dropdown-item" href="{{ route('client.profile.show') }}">Profile Setting</a>
									<a class="dropdown-item" href="{{ url('client-profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
								@elseif(Auth::user()->role_idg == 3)
									<a class="dropdown-item" href="{{ route('freelancer.profile.show') }}">Profile Setting</a>
									<a class="dropdown-item" href="{{ url('freelancer-profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
								@else
								<p>Admin</p>
								@endif
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