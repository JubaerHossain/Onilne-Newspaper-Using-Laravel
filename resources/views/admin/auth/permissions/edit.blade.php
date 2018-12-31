@extends('admin.layouts.master')

@section('title', 'Admin | Edit Permission')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

                <div class="card" style="background: #c3d1e0">
                    <div class="header">
                        <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
                    </div>
                    <div class="body">

                        {{-- @include ('errors.list') --}}
                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Permission Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <br>
                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                        <a class="btn btn-primary" href="{{route('permissions.index')}}">Back</a>


                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection
