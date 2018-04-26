@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Service Fee</h3>
				</div>
			</div>
                <form action="{{ route('servicefee.store') }}" method="POST">
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-col-xs-12 col-sm-10 col-md-6">
                            <div class="form-group {{ $errors->has('servicefee') ? ' has-error' : '' }}">
                                <label for="servicefee" class="cols-sm-2 control-label">Service Fee</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="servicefee" id="servicefee" class="form-control"  placeholder="Service Fee..." required=""/>
                                  <small class="text-danger">{{ $errors->first('servicefee') }}</small>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group btn-bot">
						<input type="submit"  value="Submit" class="btn btn-success">
						<a href="{{ URL::route('servicefee.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
                </form>
		</div>
	</div>
@endsection