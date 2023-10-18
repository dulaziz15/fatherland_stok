@extends('layouts.admin')
@section('card_judul', 'Create Barang')
@section('content')
<div class="card mt-3">
    <div class="card-body">
        <form action="" method="post">
            <div class="justify-content-end">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('barang.index') }}" class="btn bg-gradient-dark mb-0"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Nama barang</label>
                        <input type="text" id="form8Example3" class="form-control" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">jumlah</label>
                        <input type="number" id="form8Example3" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-lg-6">
                    <label class="form-label">Category</label>
                    <select class="form-select" id="single-select-field" data-placeholder="Choose one thing">
                        <option></option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar (png/jpg)</label>
                        <input class="form-control" type="file" id="formFile" onchange="preview()">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-lg-6">
                    <img id="frame" src="" class="img-fluid mb-3" width="520px"/>
                </div>
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
