@extends('layouts.master')

@section('title')
Data Location
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Location</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Location</div>
        </div>
    </div>
    <div class="section-body">
        <button class="btn btn-primary mb-4 mr-4" id="modal-5"><i class="fas fa-plus"></i>&nbsp; Add New Location</button>

        <a href="{{ route('export.location') }}" class="btn btn-info mb-4"><i class="fas fa-file-excel"></i>&nbsp; Export</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($location as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if (auth()->user()->is_admin == 1)
                                                <a href="{{ route('location.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="{{ route('delete.location', $item->id) }}"
                                                    class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i>
                                                    Delete</a>
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

<form class="modal-part" method="POST" action="{{ route('location.store') }}" id="modal-login-part">
    @csrf
    <div class="form-group">
        <label>Name Location</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Name Location" name="name">
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Save</button>
</form>
@endsection

@section('js')
<script src="{{ asset('/assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
@if (session('insert'))
<script>
    swal("Location Successfully Added", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('update'))
<script>
    swal("Location Successfully Update", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('delete'))
<script>
    swal("Location Successfully Removed", {
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
            text: "This location will be deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Location Saved!");
            }
        });
    });
</script>

@if (session('error'))
<script>
    swal("Location Cannot Delete", {
        title: "Location Cannot Delete",
        text: "This location already has a computer",
        icon: "error",
    });
</script>
@endif
@endsection