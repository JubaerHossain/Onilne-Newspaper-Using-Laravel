@extends('admin.layouts.master')

@section('title', 'Admin | Add Roles')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

                <div class="card" style="background: #c3d1e0">
                    <div class="header">
                        <h1><i class='fa fa-key'></i> Add Role</h1>
                    </div>
                    <div class="body">

                        {{-- @include ('errors.list') --}}

                        {{ Form::open(array('url' => 'roles')) }}

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
                        <a class="btn btn-primary" href="{{route('roles.index')}}">Back</a>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

