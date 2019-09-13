@extends('laraboi.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success mb-4">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th colspan="2">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy',
                                        $role->id] ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection