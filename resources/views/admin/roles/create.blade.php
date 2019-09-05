@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">

            @include('include.error-list')

            <div class="card">
                <div class="card-header">
                    Add Role
                    <div class="text-right">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.roles.store']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                    <h5><b>Assign Permissions</b></h5>
                    <div class='form-group'>
                        @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                        @endforeach
                    </div>
                    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection