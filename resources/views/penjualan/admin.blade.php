@extends('layouts.admin')
@section('card_judul', 'Penjualan')
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="table-responsive p-4">
            <div class="card-body">
                @include('penjualan.create')
                <div class="row">
                <div class="col-md-4">
                    <label for="dateInput" class="form-label">Search by Date:</label>
                    <input type="month" class="form-control" id="dateInput" placeholder="YYYY-MM-DD">
                </div>
                <div class="col-md-4">
                    <label for="dateInput" class="form-label">Filte Stand</label>
                    <select class="form-select" id="filterStand" name="jumlah"
                            data-placeholder="Choose one thing" required>
                            <option value="all">-- Pilih Nama Pegawai--</option>
                            @foreach ($stand as $pegawai)
                                <option value="{{ $pegawai->pegawai }}">{{ $pegawai->pegawai }}
                                </option>
                            @endforeach
                        </select>
                </div>
            </div>
                <table class="table align-items-center mb-0" id="penjualan">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pegawai
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pendapatan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->stand->pegawai }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->barang }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F Y') }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">@rupiah($item->jumlah * 2500)</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-6 justify-content-end" id="jumlah">

                </div>
                {{-- @include('components.admin.paginate', ['paginator' => $penjualan]) --}}
                @include('components.admin.empty', ['data' => $penjualan])
            </div>
        </div>
    </div>
@endsection
