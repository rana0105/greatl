@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Update Service Fee</h3>
				</div>
			</div>
          {!! Form::model( $servicefee, ['route' => ['servicefee.update', $servicefee->id], 'files' => true, 'method' => 'PUT']) !!}
          {{ csrf_field() }}
          <div class="row main">
              <div class="col-xs-12 col-sm-10 col-md-6">
                  <div class="form-group">
                      <label for="servicefee" class="cols-sm-2 control-label">Service Fee</label>
                      <div class="cols-sm-10">
                          <input type="text" name="servicefee" id="servicefee" class="form-control" required="" value="{{ $servicefee->servicefee }}" />
                        
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group btn-bot">
              <input type="submit"  value="Update" class="btn btn-success">
              <a href="{{ URL::route('servicefee.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
          </div>
          {!! Form::close() !!}
		</div>
	</div>
@endsection