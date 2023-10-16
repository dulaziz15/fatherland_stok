@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Barang</h4>
        </div>
    </div>
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
