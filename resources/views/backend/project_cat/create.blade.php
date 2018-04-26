@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Project Category</h3>
				</div>
			</div>
                <form action="{{ route('project-category.store') }}" method="POST">
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-col-xs-12 col-sm-10 col-md-6">
                            <div class="form-group {{ $errors->has('project_cat') ? ' has-error' : '' }}">
                                <label for="project_cat" class="cols-sm-2 control-label">Project Category</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="project_cat" id="project_cat" class="form-control"  placeholder="Project Category..." required=""/>
                                  <small class="text-danger">{{ $errors->first('project_cat') }}</small>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group btn-bot">
						<input type="submit"  value="Submit" class="btn btn-success">
						<a href="{{ URL::route('project-category.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
                </form>
		</div>
	</div>
@endsection