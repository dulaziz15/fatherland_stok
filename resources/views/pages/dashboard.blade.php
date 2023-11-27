@extends('layouts.admin')
@section('card_judul', 'Dashboard')
@section('content')
    <!-- End Navbar -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Stand</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $jumlahStand }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Barang</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $jumlahBarang }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder mb-0">
                                    +3,462
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $103,430
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($stokBarang->isNotEmpty())
        <div class="card my-4 bg-gradient-warning">
            <div class="row">
                <div class="d-flex card-body justify-content-center align-items-center">
                    <h4 class="text-white">Barang Urgent</h4>
                </div>
                @foreach ($stokBarang as $item)
                    <div class="col-md my-3 mx-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <span class="badge badge-pill badge-lg bg-gradient-warning">Stand
                                    {{ $item[0]->stand->pegawai }}</span>
                            </div>
                            <div class="card-body">
                                <ol class="list-group list-group-numbered">
                                    @foreach ($item as $barang)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $barang->barang->name }}</div>
                                                @if ($barang->barang->type == \App\Enums\enumType::Paket)
                                                    sisa persediaan {{ $barang->jumlah }}
                                                @else
                                                    {{ $barang->sisa }}
                                                @endif
                                                @if ($barang->updated_at == null)
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $barang->created_at->format('d F H:i') }}</p>
                                                @else
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $barang->updated_at->format('d F H:i') }}</p>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Penjualan Piscok</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Penjualan Brownis</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line-2" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
