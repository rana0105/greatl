@extends('layouts.main')

@section('content')
<!-- message-box  -->
<section class="message-box-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="message-box overflow-fix">
					<div class="message-box-title overflow-fix">
						<div class="page-highlight overflow-fix">
							<h2>Message-box for Freelancer</h2>
						</div>
					</div>
					<div class="message-box-content overflow-fix box-white-bg">
						<div class="message-usename overflow-fix">
							<h2>Jhony Laurents<span>(Web Designer & Developer)</span></h2>
						</div>
						<div class="message-box-start overflow-fix">
							<div class="message-user-one-area d-flex justify-content-end overflow-fix">
								<span>10:06</span><p>Hello John, thanks for contacting me. Tell me more about your experience and why you think you.</p><img src="{{ asset('images/user1.png') }}"/>
							</div>
							<div class="message-user-two-area d-flex justify-content-start overflow-fix">
								<img src="{{ asset('images/user2.png') }}"/><p>I have been a website administrator for 3 years full time working with frameworks including WordPress, Ruby On Rails, and Drupal. I studied Computer Science at university and have completed many jobs like the one you require. I am confident that I can complete the task quickly and properly.</p><span>10:07</span>
							</div>
							<div class="message-user-one-area d-flex justify-content-end overflow-fix">
								<span>10:06</span><p>Can you show me examples of some product pages you have set up in WordPress for your clients?</p><img src="{{ asset('images/user1.png') }}"/>
							</div>
							<div class="message-user-two-area d-flex justify-content-start overflow-fix">
								<img src="{{ asset('images/user2.png') }}"/><p>Yes, I can Madam. Some clients had me sign a confidentiality agreement, however, I have provided some examples of pages I have set up with permission from my clients.</p><span>10:07</span>
							</div>
							<div class="message-user-one-area d-flex justify-content-end overflow-fix">
								<span>10:06</span><p>This is great. Do you have any testimonials for your past client jobs?</p><img src="{{ asset('images/user1.png') }}"/>
							</div>
							<div class="message-user-two-area d-flex justify-content-start overflow-fix">
								<img src="{{ asset('images/user2.png') }}"/><p>Yes, Madam, I can provide you a link to my online profile. It has all of my recently completed jobs and the feedback and ratings from my clients .</p><span>10:07</span>
							</div>
							<div class="message-user-one-area d-flex justify-content-end overflow-fix">
								<span>10:06</span><p>How long do you estimate it will take you to complete this task?</p><img src="{{ asset('images/user1.png') }}"/>
							</div>
							<div class="message-user-two-area d-flex justify-content-start overflow-fix">
								<img src="{{ asset('images/user2.png') }}"/><p>I estimate that this will take me 3 hours to complete. I can finish it by tomorrow morning, 11am.</p><span>10:07</span>
							</div>
						</div>
						<div class="message-chat-textarea overflow-fix">
						<div class="message-chat-box-input-filed  overflow-fix">
							<input class="" placeholder="Type a message"/>
						</div>
						<div class="message-chat-box-upload-filed overflow-fix">
							<ul>
								<li>
									<input type="file" name="Drag or Upload Files" accept="media_type/*">
									<i class="fa fa-paperclip" aria-hidden="true"></i>
								</li>
								<li class="sendBtn">
									<button type="submit" class="btn btn-sm">
										<i class="fa fa-paper-plane-o"></i> send 
									</button>
								</li>
							</ul>
						</div>
					</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	const userId = {{ Auth::user()->id }};
	const project = {{ $project }};
</script>
<script src="{{ asset('js/app.js') }}"></script>

@endsection