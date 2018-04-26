<li class="mail-notifi">
	<?php $infoUnreadNotification = Request::user()->unreadNotifications->count(); ?>
	<div class="dropdown">
	  <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-bell" aria-hidden="true"></i>
		@if( $infoUnreadNotification > 0)
		<span class="counter">{{ $infoUnreadNotification }}</span>
		@endif
	  </a>
	   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<div class="single-modal-nofi overflow-fix">
				<a href="">
					<p><span>MorSeD-Vai</span> Post In your<span>Project Name</span></p>
					<h2>12 Munite Ago</h2>
				</a>
			</div>
			<div class="single-modal-nofi overflow-fix">
				<a href="">
					<p><span>MorSeD-Vai</span> Post In your<span>Project Name</span></p>
					<h2>12 Munite Ago</h2>
				</a>
			</div>
			<div class="single-modal-nofi overflow-fix">
				<a href="">
					<p><span>MorSeD-Vai</span> Post In your<span>Project Name</span></p>
					<h2>12 Munite Ago</h2>
				</a>
			</div>
		</div>
	</div>
</li>

