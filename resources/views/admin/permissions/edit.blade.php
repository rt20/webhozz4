@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('include.error-list')

            <div class="card">
                <div class="card-header">
                    Edit {{$permission->name}}
                    <div class="text-right">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    {{ Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Permission Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                    <br>
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection