@extends('layouts.admin')
@section('card_judul', 'Transaction')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="d-flex justify-content-end align-items-center mx-2">
                        <button class="btn bg-gradient-success mb-0" onclick="actionMasuk()"><i class="fas fa-plus"
                                aria-hidden="true"></i>&nbsp;&nbsp;Masuk</button>

                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button class="btn bg-gradient-danger mb-0" onclick="actionKeluar()"><i class="fas fa-minus"
                                aria-hidden="true"></i>&nbsp;&nbsp;Keluar</button>

                    </div>
                </div>
            </div>
            @include('action.masuk')
            @include('action.keluar')
        </div>
        <div class="card-body">
            <div class="table-responsive px-4">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
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
                                        @if($item->action == 'masuk')
                                            <span class="badge badge-pill badge-lg bg-gradient-success">{{ $item->action }}</span>
                                        @else
                                            <span class="badge badge-pill badge-lg bg-gradient-danger">{{ $item->action }}</span>
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->note }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                                    {{-- mobile --}}

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
    <script>
        function actionMasuk() {
            const form = $('#formMasuk');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                form.fadeIn();
                $('#formKeluar').fadeOut();
            }
        }

        function actionKeluar() {
            const form = $('#formKeluar');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                form.fadeIn();
                $('#formMasuk').fadeOut();
            }
        }

        function disableSisa() {
            if ($('.type').val() === 'satuan') {
                $('.sisa').prop('disabled', false);
            } else {
                $('.sisa').prop('disabled', true);
            }
        }
    </script>

@endsection
