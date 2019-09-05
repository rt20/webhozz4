@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash::message')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-4">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="no-b">
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>User Roles</th>
                                    <th colspan="2">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete"
                                            data-confirm="Are you sure?" class="btn btn-danger">Delete</a>
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