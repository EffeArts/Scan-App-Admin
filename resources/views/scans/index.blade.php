
@extends('adminlte::page')

@section('title', 'Scans')

@section('content_header')
    <h1>All scans</h1>

    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Total Scans</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53</h3>

              <p>Normal Temperature</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Mild Temperature</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>High Temperature</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
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