@extends('laraboi.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('include.error-list')

            <div class="card">
                <div class="card-header">
                    Add Permission

                    <div class="text-right">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.permissions.store']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', array('class' => 'form-control')) }}
                    </div>
                    @if(!$roles->isEmpty())
                    <h4>Assign Permission to Roles</h4>
                    @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}
                    @endforeach
                    @endif
                    <br>
                    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection