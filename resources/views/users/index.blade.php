
@extends('adminlte::page')

@section('title', 'Manage Users')

@section('content_header')
    <h1>Manage Users</h1>
@stop

@section('content')

<div class="row">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id = "scans">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Names</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Associated Device</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_name }}</td>
                                <td>{{ $user->device_name }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
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