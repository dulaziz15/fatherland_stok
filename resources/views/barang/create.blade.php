@extends('layouts.admin')
@section('card_judul', 'Create Barang')
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="justify-content-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('barang.index') }}" class="btn bg-gradient-dark mb-0"><i
                                class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-lg-6">
                        <div class="form-outline">
                            <label class="form-label" for="form8Example3">Nama barang</label>
                            <input type="text" id="form8Example3" class="form-control" name="barang" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Type</label>
                        <select class="form-select" id="single-select-field" data-placeholder="Choose one thing" name="type">
                            <option></option>
                            <option value="{{ App\Enums\enumType::Satuan }}">{{ App\Enums\enumType::Satuan }}</option>
                            <option value="{{ App\Enums\enumType::Paket }}">{{ App\Enums\enumType::Paket }}</option>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" id="single-select-field" data-placeholder="Choose one thing" name="id_category">
                            <option></option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar (png/jpg)</label>
                            <input class="form-control" type="file" name="gambar" id="formFile" onchange="preview()" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6 justify-content-end">
                        <div class="card mt-3">
                            <div class="card-body">
                                <img id="frame" src="" class="img-fluid my-3" width="530px"
                                    alt="Preview gambar" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-2">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6 d-flex justify-content-end align-items-center">
                        <button class="btn bg-gradient-dark mx-2" type="button" onclick="clearImage()">Clear Image</button>
                        <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                        <button class="btn bg-gradient-success" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
