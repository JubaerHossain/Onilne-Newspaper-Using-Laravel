@extends('admin.layouts.master')
@section('title', 'Admin | Permissions')
@push('css')
    <link href="{{ asset('assets/backend')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <h3 class="mb-3">User Administration </h3>
                        <a href="{{ route('permissions.create') }}" class="btn btn-success pull-center">Add Permission </a>
                        <a href="{{ route('roles.index') }}"  type="button" class="btn btn-success waves-effect pull-right ml-2">Roles</a>
                        <a href="{{ route('users.index') }}"  type="button" class="btn btn-success waves-effect pull-right mr-2" style="margin-right: 3px">Users</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/backend')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="{{ asset('assets/backend')}}/js/pages/tables/jquery-datatable.js"></script>


@endpush

