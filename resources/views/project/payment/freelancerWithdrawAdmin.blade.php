@extends('layouts.admin')
@section('content')
	<div class="col-md-10 col-md-offset-0 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Withdraw history by Admin</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Date</th>
							<th>Freelancer</th>
							<th>Request Amount</th>
							<th>Faild Amount</th>
							<th>Status</th>
							<th>Aciton</th>
						</tr>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						@foreach($freeWithdraw as $withdraw)
							<tr>
								<td>{{ $sr++ }}</td>
								<td>{{ date('d-M-Y', strtotime($withdraw->created_at)) }}</td>
								<td>{{ $withdraw->freelancer->name }}</td>
								<td>$ {{ $withdraw->withdraw_amount }}</td>
								<td>$ {{ $withdraw->faild_amount }}</td>
								<td>
									@if($withdraw->status == 1)
									<span class="label label-success">Complete</span> 
									@else
									<span class="label label-info">Pending</span>
									@endif
								</td>
								<td>
									@if(!$withdraw->status == 1)
									@if($withdraw->faild_amount == null)
									<form class="submit_form" action="{{ route('faild.amount', $withdraw->id) }}" method="POST">
										{{ csrf_field() }}
										<button class="btn alert_show"><i class="fa fa-window-close-o fa-lg text-danger" aria-hidden="true"></i></button>
									</form>
									@else
									<form class="submit_form" action="{{ route('retry.amount', $withdraw->id) }}" method="POST">
										{{ csrf_field() }}
										<button class="btn alert_show"><i class="fa fa-refresh fa-lg text-warning" aria-hidden="true"></i></button>
									</form>
									@endif
									@if($withdraw->faild_amount == null)
									<form class="submit_form" action="{{ route('status.complete', $withdraw->id) }}" method="POST">
										{{ csrf_field() }}
										<button class="btn alert_show"><i class="fa fa-paper-plane-o fa-lg text-primary" aria-hidden="true"></i></button>
									</form>
									@endif
									@else
									<button class="btn"><i class="fa  fa-check-square-o fa-lg text-success" aria-hidden="true"></i></button>
									@endif
								</td>
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
$('button.alert_show').on('click', function(e){
	e.preventDefault();
	var self = $(this);
	swal({
	    title             : "Are you sure?",
	    text              : "You will not be able to recover this!",
	    type              : "warning",
	    showCancelButton  : true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText : "Yes, Update It!",
	    cancelButtonText  : "No, Cancel Update!",
	    closeOnConfirm    : false,
	    closeOnCancel     : false
	},
	function(isConfirm){
	    if(isConfirm){
	        swal("Updated!","It has been updated", "success");
	        setTimeout(function() {
	            self.parents(".submit_form").submit();
	        }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
	    }
	    else{
	          swal("Cancelled","It is safe", "error");
	    }
	});
});
</script>
@endsection