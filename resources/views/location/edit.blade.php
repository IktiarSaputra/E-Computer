@extends('layouts.master')

@section('title')
    Update Location {{ $location->name }}
@endsection

@section('css')
    
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Location {{ $location->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('location.index') }}">Location</a></div>
                <div class="breadcrumb-item">Update Location</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{ route('location.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i>&nbsp; &nbsp; Back</a>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('location.update', $location->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name Location</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $location->name }}" placeholder="Name Location" name="name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i>&nbsp;  Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    
@endsection