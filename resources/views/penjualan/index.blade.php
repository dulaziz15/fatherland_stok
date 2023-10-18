@extends('layouts.admin')
@section('card_judul', 'Penjualan')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('penjualan.create') }}" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add Report Penjualan</a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pegawai
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            </th>
                            <th class="text-secondary opacity-7"></th>
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
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-3">
                                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-gradient-danger d-none d-md-block"
                                                    onclick="return confirm()" data-bs-toggle="tooltip" title="Delete"
                                                    type="submit"><span class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- mobile --}}
                                    <div class="btn-group dropleft mt-3 d-md-none">
                                        <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">

                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 bg-body border"
                                            aria-labelledby="dropdownMenuButton">
                                                <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm()"
                                                        class="dropdown-item border-radius-md"
                                                        type="submit">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            @include('category.modalEdit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
