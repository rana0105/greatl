@extends('layouts.admin')
@section('content')
 <div class="col-md-6 col-lg-8 main">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="{{ url('dashboard') }}">Home</a>
        </nav>
        <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-2">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('User', $result->count()) }} </h3>
        </div>
        <div class="col-md-12 page-action text-right">
            @can('add_users')
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            <?php $sr = 1; ?>
            @foreach($result as $item)
                <tr>
                    <td>{{ $sr++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_users')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div id="t-cent">
            {{ $result->links() }}
        </div>
    </div>
    </div>
      <!-- #main col-->
    </div>
    <!-- #row -->

  </div>
  <!-- #container -->
@endsection