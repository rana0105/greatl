@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Job Level</h3>
				</div>
			</div>
                <form action="{{ route('job-level.store') }}" method="POST">
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-col-xs-12 col-sm-10 col-md-6">
                            <div class="form-group {{ $errors->has('job_level') ? ' has-error' : '' }}">
                                <label for="job_level" class="cols-sm-2 control-label">Job Level</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="job_level" id="job_level" class="form-control"  placeholder="Job Level..." required=""/>
                                  <small class="text-danger">{{ $errors->first('job_level') }}</small>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group btn-bot">
						<input type="submit"  value="Submit" class="btn btn-success">
						<a href="{{ URL::route('job-level.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
                </form>
		</div>
	</div>
@endsection