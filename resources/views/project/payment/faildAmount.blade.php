@extends('layouts.admin')
@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Faild Amount history</h3>
			</div>
			<form action="{{ route('faild.amount', $faildAmount->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="number" readonly="" value="{{ $faildAmount->withdraw_amount }}" class="form-control">
				</div>
				<div class="form-group">
					<input type="number" readonly="" name="faild_amount" value="{{ $faildAmount->withdraw_amount }}" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
@endsection