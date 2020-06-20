
@extends('adminlte::page')

@section('title', 'Scans')

@section('content_header')
    <h1>All scans</h1>
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
                        <th>National ID</th>
                        <th>Device</th>
                        <th>Done At</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($scans as $scan)
                            <tr>
                                <td>{{ $scan->id }}</td>
                                <td>{{ $scan->nid_number }}</td>
                                <td>{{ $scan->device_name }}</td>
                                <td>{{ $scan->createdAt }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $scans->links() }}
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