@extends('layouts.master')

@section('title')
Dashboard Admin
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Computer</h4>
                    </div>
                    <div class="card-body">
                        {{ \DB::table('computers')->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Location</h4>
                    </div>
                    <div class="card-body">
                        {{ \DB::table('locations')->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Computer Active</h4>
                    </div>
                    <div class="card-body">
                        {{ $active }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Computer Repair</h4>
                    </div>
                    <div class="card-body">
                        {{ $repair }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Computer Off</h4>
                    </div>
                    <div class="card-body">
                        {{ $off }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="section-title">Data Location</h2>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total Computer</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($location as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->computer->count() == 0)
                                            <span class="badge badge-danger">No Unit</span>
                                        @else
                                            <span class="badge badge-primary">{{ $item->computer->count() }} Unit Computer</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
@endsection