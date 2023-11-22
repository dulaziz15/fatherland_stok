@extends('layouts.admin')
@section('card_judul', 'Stok Barang')
@section('content')
    <div class="card bg-gradient-warning mb-3">
        <div class="card-header">
            <span class="badge badge-pill badge-lg bg-gradient-warning">Barang Satuan</span>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($satuan as $barangSatuan)
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge badge-pill badge-lg bg-gradient-warning">Stand {{ $barangSatuan[0]->stand->pegawai }}</span>
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    barang
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    category
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Kondisi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangSatuan as $semuaBarang)
                                                <tr>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $semuaBarang->barang->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $semuaBarang->barang->category->category }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $semuaBarang->sisa }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card bg-gradient-primary mb-3">
        <div class="card-header">
            <span class="badge badge-pill badge-lg bg-gradient-primary">Barang Paket</span>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($paket as $barangSatuan)
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge badge-pill badge-lg bg-gradient-primary">Stand {{ $barangSatuan[0]->stand->pegawai }}</span>
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    barang
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                category
                                            </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    jumlah
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangSatuan as $semuaBarang)
                                                <tr>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $semuaBarang->barang->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $semuaBarang->barang->category->category }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $semuaBarang->jumlah }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
