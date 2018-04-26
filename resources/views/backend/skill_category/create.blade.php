@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Skill Category</h3>
				</div>
			</div>
                <form action="{{ route('skill-category.store') }}" method="POST">
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-col-xs-12 col-sm-10 col-md-6">
                            <div class="form-group {{ $errors->has('skill_category') ? ' has-error' : '' }}">
                                <label for="skill_category" class="cols-sm-2 control-label">Skill Category</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="skill_category" id="skill_category" class="form-control"  placeholder="Skill Category..." required=""/>
                                  <small class="text-danger">{{ $errors->first('skill_category') }}</small>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group btn-bot">
						<input type="submit"  value="Submit" class="btn btn-success">
						<a href="{{ URL::route('skill-category.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
                </form>
		</div>
	</div>
@endsection