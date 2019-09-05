@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
            <div class="card no-b no-r">
                {{ Form::open(['route' => 'admin.users.store', 'files' => true]) }}
                <div class="card-body">

                    <h5 class="card-title">
                        User
                        <div class="text-right">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </h5>
                    <hr>
                    @include('include.error-list')

                    <div class="form-group pb-1">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', array('class' => 'form-control r-0 light s-12')) }}
                    </div>
                    <div class="form-group pb-1">
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', '', array('class' => 'form-control r-0 light s-12')) }}
                    </div>
                    <div class="form-group pb-1">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', '', array('class' => 'form-control r-0 light s-12')) }}
                    </div>
                    <div class="form-group pb-1">
                        {{ Form::label('role', 'Give Some Role') }}
                        @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                    </div>
                    <div class="form-group pb-1">
                        {{ Form::label('password', 'Password') }}<br>
                        {{ Form::password('password', array('class' => 'form-control r-0 light s-12')) }}
                    </div>
                    <div class="form-group pb-1">
                        {{ Form::label('password', 'Confirm Password') }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control r-0 light s-12')) }}
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection