@extends('admin.layouts.master')

@section('title', 'Admin | Edit User')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

                <div class="card" style="background: #c3d1e0">
                    <div class="header">
                        <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
                    </div>
                    <div class="body">

                        {{-- @include ('errors.list') --}}

                        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>

                        <h5><b>Give Role</b></h5>

                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                        </div>

                        {{ Form::submit('Submit', array('class' => 'btn btn-success pull-middle')) }}
                          <a class="btn btn-primary" href="{{route('users.index')}}">Back</a>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection
