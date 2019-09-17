@extends('laraboi.app')

@section('content')

<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">User</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Users</h4>
        </div>
        <div class="text-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm pd-x-15 btn-white btn-uppercase">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
        </div>
    </div>
    @include('flash::message')
    <form class="" action="{{ route('admin.users.index') }}" method="post">
        <div class="row row-sm mg-b-10">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit" id="button-addon2"><i class="fa fa-search"></i>    </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div data-label="User" class="df-example demo-table">
        <div class="table-responsive">
            <table class="table table-striped mg-b-0 table-bordered table-hover">
                <thead class="thead-primary">
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
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete" data-confirm="Are you sure?" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
