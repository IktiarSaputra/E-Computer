@extends('layouts.master')

@section('title')
Update Computer
@endsection

@section('css')
<style>
    .file-upload .image-box {
        margin-top: .5em;
        height: 15em;
        width: 20em;
        cursor: pointer;
        overflow: hidden;
        border-radius: 20px
    }

    .file-upload .image-box img {
        height: 100%;
    }

    .file-upload .image-box p {
        position: relative;
        top: 45%;
        color: #000;
    }
</style>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Computer</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('computer.index') }}">Computer</a></div>
            <div class="breadcrumb-item">Update Computer</div>
        </div>
    </div>
    <div class="section-body">
        <a href="{{ route('computer.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i>&nbsp;
            &nbsp; Back</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('computer.update', $computer->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @php
                            $network = explode(",",$computer->network);
                            @endphp

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No</label>
                                        <input type="number" value="{{ $computer->no }}" class="form-control" readonly
                                            placeholder="No" name="no">
                                    </div>
                                    <div class="form-group">
                                        <label>Procesor</label>
                                        <input type="text" class="form-control" value="{{ $computer->procesor }}"
                                            placeholder="Procesor" name="procesor" required>
                                        <p class="text-danger">{{ $errors->first('procesor') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select name="location" class="form-control">
                                            <option selected>Select Location</option>
                                            @foreach ($location as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $computer->location_id ? 'selected':'' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('location_id') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Memory</label>
                                        <div class="input-group mb-2">
                                            <input type="number" value="{{ $computer->memory }}" class="form-control"
                                                id="inlineFormInputGroup2" name="memory" placeholder="Memory" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">GB</div>
                                            </div>
                                        </div>
                                        <p class="text-danger">{{ $errors->first('memory') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>HardDisk</label>
                                        <input type="text" class="form-control" value="{{ $computer->harddisk }}"
                                            placeholder="HardDisk" name="harddisk" required>
                                        @error('harddisk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>VGA</label>
                                        <select name="vga" class="form-control">
                                            <option value="Internal" {{ "Internal" == $computer->vga ? 'selected':'' }}>
                                                Internal</option>
                                            <option value="External" {{ "External" == $computer->vga ? 'selected':'' }}>
                                                External</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('vga') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Condition</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $computer->condition == "Hidup" ? 'checked':'' }} name="condition"
                                                id="active" value="Hidup">
                                            <label class="form-check-label" for="active">
                                                On
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $computer->condition == "Mati" ? 'checked':'' }} name="condition"
                                                id="off" value="Mati">
                                            <label class="form-check-label" for="off">
                                                Off
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $computer->condition == "Sedang DiPerbaiki" ? 'checked':'' }}
                                                name="condition" id="repair" value="Sedang DiPerbaiki">
                                            <label class="form-check-label" for="repair">
                                                Repaired
                                            </label>
                                        </div>
                                        <p class="text-danger">{{ $errors->first('condition') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Network</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="network[]" type="checkbox" id="wifi"
                                                value="WIFI" @if (in_array("WIFI", $network)) checked @endif>
                                            <label class="form-check-label" for="wifi">WIFI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="network[]" type="checkbox"
                                                id="lancard" value="LAN CARD" @if (in_array("LAN CARD", $network))
                                                checked @endif>
                                            <label class="form-check-label" for="lancard">LAN CARD</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="network[]" type="checkbox"
                                                id="lanonboard" value="LAN ONBOARD" @if (in_array("LAN ONBOARD",
                                                $network)) checked @endif>
                                            <label class="form-check-label" for="lanonboard">LAN ONBOARD</label>
                                        </div>
                                        <p class="text-danger">{{ $errors->first('network') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Monitor</label>
                                        <input type="text" class="form-control" placeholder="Monitor" name="monitor"
                                            value="{{ $computer->monitor }}" required>
                                        <p class="text-danger">{{ $errors->first('monitor') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mouse</label>
                                        <input type="text" class="form-control" placeholder="Mouse" name="mouse"
                                            value="{{ $computer->mouse }}" required>
                                        <p class="text-danger">{{ $errors->first('mouse') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Keyboard</label>
                                        <input type="text" class="form-control" placeholder="Keyboard" name="keyboard"
                                            value="{{ $computer->keyboard }}" required>
                                        <p class="text-danger">{{ $errors->first('keyboard') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="type" class="form-control">
                                            <option value="PC" {{ "PC" == $computer->type ? 'selected':'' }}>PC</option>
                                            <option value="Deskbook"
                                                {{ "Deskbook" == $computer->type ? 'selected':'' }}>Deskbook</option>
                                            <option value="Laptop" {{ "Laptop" == $computer->type ? 'selected':'' }}>
                                                Laptop</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('type') }}</p>
                                    </div>
                                    <div class="control-group file-upload" id="file-upload1">
                                        <div class="image-box text-center">
                                            <p>Upload Image</p>
                                            <img src="{{ asset('/computers/'. $computer->image) }}" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="image" />
                                        </div>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" cols="30" rows="10"
                                            required>{{ $computer->description }}</textarea>
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i>&nbsp;
                                Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(".image-box").click(function (event) {
        var previewImg = $(this).children("img");

        $(this)
            .siblings()
            .children("input")
            .trigger("click");

        $(this)
            .siblings()
            .children("input")
            .change(function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var urll = e.target.result;
                    $(previewImg).attr("src", urll);
                    previewImg.parent().css("background", "transparent");
                    previewImg.show();
                    previewImg.siblings("p").hide();
                };
                reader.readAsDataURL(this.files[0]);
            });
    });
</script>
@endsection