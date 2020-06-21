
@extends('adminlte::page')

@section('title', 'Devices')

@section('content_header')
    <h1>All devices</h1>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
            <div class="alert alert-{{ $msg }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> Alert!</h4>
                {{ Session::get($msg) }}
            </div>
        @endif
    @endforeach
@stop

@section('content')

<div class="row">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Add a new Device</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('devices.store') }}">
                    @csrf
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Device Name" required name="device_name">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="UID Number" required name="uid_number">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-info" type="submit" style="width: 100%;">
                                Add Device
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<div class="row">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id = "devices">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Device Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->device_name }}</td>
                                <td>{{ $device->createdAt }}</td>
                                <td>
                                    <input type="hidden" class="deviceId" value="{{ $device->id }}">
                                    <a href="#" class="editMenuModalButton">Edit</a>|
                                    <a href="#" class="deleteMenuButton">Delete</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $devices->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop