@extends('layouts.admin')
@section('card_judul', 'Log Activity')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive px-4">
                <span class="badge badge-pill badge-lg bg-gradient-success">Semua Transaksi</span>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">perubahan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($log as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->barang->name }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        @if ($item->action == 'masuk')
                                            <span
                                                class="badge badge-pill badge-lg bg-gradient-success">{{ $item->action }}</span>
                                        @elseif($item->action == 'keluar')
                                            <span
                                                class="badge badge-pill badge-lg bg-gradient-danger">{{ $item->action }}</span>
                                        @else
                                            <span
                                                class="badge badge-pill badge-lg bg-gradient-info">{{ $item->action }}</span>
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        @if ($item->jumlah == null)
                                            {{ $item->sisa }}
                                        @else
                                            {{ $item->jumlah }}
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->note }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- // paginate --}}
                {{-- in this line --}}
                @include('components.admin.paginate', ['paginator' => $log])
                @include('components.admin.empty', ['data' => $log])
            </div>
        </div>
    </div>
@endsection
