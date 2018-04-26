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
							<h2>Message-box for</h2>
						</div>
					</div>
					<div class="message-box-content overflow-fix box-white-bg">
							<div class="message-usename overflow-fix">
								<h2>{{$project->jobpostclient->name}} <span>({{$project->p_title}})</span> </h2>
							</div>
							<?php $popsUser = json_encode([
								'id'=>Auth::user()->id,
								'pic' => Auth::user()->profilePic->p_image]); ?>
							<?php $propsReceiver = json_encode([
								'id' => $project->jobpostclient->id,
								'pic' => $project->jobpostclient->profilePic->p_image]); ?>
							<freelencer
								:project="{{ $project->id }}"
								:user="{{$popsUser}}"
								:receiver="{{$propsReceiver}}"
							></freelencer>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	const senderProfile = "{{$project->jobpostclient->profilePic->p_image}}";
	const userProfile = "{{Auth::user()->profilePic->p_image}}";
</script>
@endsection
