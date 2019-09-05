@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card r-0 shadow">
                <div class="table-responsive">
                    <table class="table table-striped table-hover r-0">
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
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <i class="icon-pencil mr-3"></i>
                                    </a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete"
                                        data-confirm="Are you sure?"><i class="icon-trash"></i></a>
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
@endsection