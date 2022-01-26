@extends('layouts.master')

@section('title')
Data Computer
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Computer</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Computer</div>
        </div>
    </div>
    <div class="section-body">
        <a href="{{ route('computer.create') }}" class="btn btn-primary mb-4 mr-4"><i class="fas fa-plus"></i>&nbsp; Add
            New Computer</a>

        <a href="{{ route('print.computer') }}" class="btn btn-primary mb-4 mr-4" target="_BLANK"><i
                class="fas fa-print"></i>&nbsp; Print Computer</a>

        <a href="{{ route('export.computer') }}" class="btn btn-info mb-4"><i
                    class="fas fa-file-excel"></i>&nbsp; Export Excel</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Procesor</th>
                                        <th>Memory / Ram</th>
                                        <th>Condition</th>
                                        <th>Location</th>
                                        <th>Type</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($computer as $item)
                                    <tr>
                                        <td>
                                            {{ $item->no }}
                                        </td>
                                        <td>
                                            {{ $item->procesor }}
                                        </td>
                                        <td>
                                            {{ $item->harddisk }} / {{ $item->memory }} GB
                                        </td>
                                        <td>
                                            @if ($item->condition == "Hidup")
                                            <span class="badge badge-success"
                                                style="font-size: 15px;padding: 5px 40px;border-radius: 50px">On</span>
                                            @elseif($item->condition == "Sedang DiPerbaiki")
                                            <span class="badge badge-warning"
                                                style="font-size: 15px;padding: 5px 40px;border-radius: 50px">Repair</span>
                                            @else
                                            <span class="badge badge-danger"
                                                style="font-size: 15px;padding: 5px 40px;border-radius: 50px">Off</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->location->name }}
                                        </td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if (auth()->user()->is_admin == 1)
                                            <a href="{{ route('computer.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm mb-3"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{ route('delete.computer', $item->id) }}"
                                                class="btn btn-danger btn-sm delete mb-3"><i class="fas fa-trash"></i>
                                                Delete</a>
                                            <a href="{{ route('computer.show', $item->id) }}"
                                                class="btn btn-warning btn-sm mb-3" target="_BLANK"><i
                                                    class="fas fa-print"></i> Edit</a>
                                            @endif
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
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('/assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>

@if (session('insert'))
<script>
    swal("Computer Successfully Added", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('update'))
<script>
    swal("Computer Successfully Update", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('delete'))
<script>
    swal("Computer Successfully Removed", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

<script>
    $('.delete').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "Are You Sure?",
            text: "This computer will be deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Computer Saved!");
            }
        });
    });
</script>
@endsection