@extends('layouts.admin')
@section('title', 'Roles & Permissions')
@section('content')
 <div class="col-md-6 col-lg-9 main">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="{{ url('dashboard') }}">Home</a>
        </nav>
        <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="roleModalLabel">Role</h4>
                </div>
                <div class="modal-body">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <!-- Submit Form Button -->
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h3>Roles</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_roles')
                <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
            @endcan
        </div>
    </div>


    @forelse ($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

        @if($role->name === 'Admin')
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'options' => ['disabled'] ])
            @can('edit_roles')
                {!! Form::submit('Save', ['class' => 'btn btn-primary role_r']) !!}
            @endcan
        @else
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'model' => $role ])
            @can('edit_roles')
                {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 3%;']) !!}
            @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
    </div>
      <!-- #main col-->
    </div>
    <!-- #row -->

  </div>
  <!-- #container -->
@endsection