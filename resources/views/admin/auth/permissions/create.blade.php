@extends('admin.layouts.master')

@section('title', 'Admin | Add Permission')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

                <div class="card" style="background: #c3d1e0">
                    <div class="header">
                        <h1><i class='fa fa-key'></i> Add Permission</h1>
                    </div>
                    <div class="body">

                        {{-- @include ('errors.list') --}}
                        {{ Form::open(array('url' => 'permissions')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div>
                        <br>

                        @if(!$roles->isEmpty())

                            <h4>Assign Permission to Roles</h4>

                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach

                        @endif

                        <br>
                        {{ Form::submit('Add', array('class' => 'btn btn-success')) }}
                        <a class="btn btn-primary" href="{{route('permissions.index')}}">Back</a>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

