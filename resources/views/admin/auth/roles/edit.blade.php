@extends('admin.layouts.master')

@section('title', 'Admin | Edit Roles')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

                <div class="card" style="background: #c3d1e0">
                    <div class="header">
                        <h1><i class='fa fa-key'></i> Edit {{$role->name}}</h1>
                    </div>
                    <div class="body">

                        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <h5><b>Assign Permissions</b></h5>
                        @foreach ($permissions as $permission)

                            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                        @endforeach
                        <br>
                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                        <a class="btn btn-primary" href="{{route('roles.index')}}">Back</a>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection
