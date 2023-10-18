@extends('layouts.admin')
@section('card_judul', 'Barang')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('barang.create') }}" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add Barang</a>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection
